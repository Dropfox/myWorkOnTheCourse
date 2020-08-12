<?php


function getSmallerOfThree($x, $y, $z)
{
    if ($x < $y & $z) {
        return $x;
    } elseif ($y < $x & $z) {
        return $y;
    }
    return $z;
}

$a = 15;
$b = 25;
$c = 6;
echo 'Наименьшее значение равно: ' . getSmallerOfThree($a, $b, $c);

echo '<br>';
echo '<br>';
echo '<br>';

$e = 'Здравствуй машуня, как у тебя дела?';
echo '<div style="text-align: center"> привет машуня </div>';

$x = '<div style="color: #fff; /* цвет текста */
  text-decoration: none; /* убирать подчёркивание у ссылок */
  user-select: none; /* убирать выделение текста */
  background: midnightblue; /* фон кнопки */
  padding: .7em 1.5em; /* отступ от текста */
  outline: none; /* убирать контур в Mozilla */
  display: inline-block;
  margin-left: 25px;">как ваше ничего </div>';

echo $x;

echo '<br>';
echo '<br>';
echo '<br>';

echo "$x" . '<div style="color: #fff; /* цвет текста */
  text-decoration: none; /* убирать подчёркивание у ссылок */
  user-select: none; /* убирать выделение текста */
  background: midnightblue; /* фон кнопки */
  padding: .7em 1.5em; /* отступ от текста */
  outline: none; /* убирать контур в Mozilla */
  display: inline-block;
  margin-left: 25px;"> все хорошо </div>';

echo '<br>';
echo '<br>';

echo __DIR__;

include __DIR__ . '/Functions.php'; /* есть require- используется в случае если подключение внешнего файла обязательно! */

?>
<html>
<head>
    <title>Пример подключения фалов</title>
</head>
<body>
Число 2 <?= isEven(2) ? 'Четное' : 'Нечетное' ?><br>
Число 5 <?= isEven(5) ? 'Четное' : 'Нечетное' ?><br>
Число 8 <?= isEven(8) ? 'Четное' : 'Нечетное' ?><br>
</body>
</html>
