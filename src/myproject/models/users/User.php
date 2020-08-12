<?php

namespace myproject\models\users;


use myproject\Exceptions\InvalidArgumentException;
use myproject\Exceptions\InvalidFileLoaded;
use myproject\Exceptions\LoginExceptions;
use myproject\Models\ActiveRecordEntity;
use myproject\Services\Vardump;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;
    protected $avatar;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    public function getIsConfirmed()
    {
        return $this->isConfirmed;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getAvatar()
    {
        if ($this->avatar === null) {
            $this->avatar = '/src/img/without.jpg';
            return $this->avatar;
        }
        return $this->avatar;
    }

    public function setAvatar($puthAvatar)
    {
        $this->avatar = $puthAvatar;
    }

    public function addAvatar($file)
    {

        if ($file['name'] === '') {
            throw new InvalidFileLoaded('Выберете файл');
        }

        if ($this->getAvatar() !== '/src/img/without.jpg') {
            throw new InvalidFileLoaded('У вас уже установлен аватар');
        }

        $allowedExtention = ['jpg', 'png'];
        $extention = pathinfo($file['name'], PATHINFO_EXTENSION);

        if (!in_array($extention, $allowedExtention)) {
            throw new InvalidFileLoaded('Запрещенный формат файла');
        }

        preg_match("/[А-Яа-я]/", $file['name'], $pattern);

        if (!empty($pattern)) {
            $file['name'] = rand(1, 100000) . rand(1, 100000) . '.' . $extention;
        }

        $newFilePath = __DIR__ . '/../../../../src/img/' . $file['name'];

        if (file_exists($newFilePath)) {
            throw new InvalidFileLoaded('Файл с таким именем существует');
        }

        $filePuthForBd = '/src/img/' . $file['name'];

        if (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
            throw new InvalidFileLoaded('ошибка загрузки файла');
        }

        $this->setAvatar($filePuthForBd);
        $this->save();
    }

    public static function signUp(array $userData)
    {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData ['nickname'])) {
            throw new InvalidArgumentException('Никнейм может состоять лишь из латинских символов и цифр');
        }

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email не корректен');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        if (strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Указанно меньше 8 символов');
        }

        if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Никнейм уже занят');
        }
        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email существует');
        }

        $user = new User();
        $user->nickname = $userData ['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = false;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;

    }

    public function activate()
    {
        $this->isConfirmed = true;
        $this->save();
    }

    public static function login($loginData)
    {
        if (empty ($loginData['email'])) {
            throw new LoginExceptions('Введите email');
        }
        if (empty($loginData['password'])) {
            throw new LoginExceptions('Введите пароль');
        }
        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user == null) {
            throw new LoginExceptions('Такого email не существует');
        }
        if (!password_verify($loginData ['password'], $user->getPasswordHash())) {
            throw new LoginExceptions('Введенный пароль не верный');
        }
        if (!$user->isConfirmed) {
            throw new LoginExceptions('Пользователь не подтверждён');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }

    private function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }
}