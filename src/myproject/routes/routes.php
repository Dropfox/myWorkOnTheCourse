<?php

return [
    '~^hello/(.*)$~'  => [ myproject\controllers\MainController::class , 'sayHello'],
    '~^$~'  => [ myproject\controllers\MainController::class , 'main'],
    '~^bye/(.*)$~' => [myproject\controllers\MainController::class , 'sayBye'],
    '~^articles/(\d+)$~'=> [myproject\controllers\ArticlesController::class, 'view'],
    '~^users/(\d+)$~' => [myproject\controllers\UsersController::class, 'user'],
    '~^articles/(\d+)/edit$~' => [myproject\controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class , 'deleteOn'],
    '~^users/register$~' => [\myproject\controllers\UsersController::class , 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\myproject\controllers\UsersController::class , 'activate'],
    '~^users/login$~' => [\myproject\controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [\myproject\controllers\UsersController::class , 'logout'],
    '~^articles/(\d+)/comments/(\d+)$~' => [\myproject\controllers\CommentsController::class , 'viewComment'],
    '~^articles/(\d+)/comments/add$~' => [\myproject\controllers\CommentsController::class , 'add'],
    '~^articles/(\d+)/comments/(\d+)/delete$~' => [\myproject\controllers\CommentsController::class , 'deleteComment'],
    '~^articles/(\d+)/comments/(\d+)/edit$~' => [\myproject\controllers\CommentsController::class, 'editComment'],
    '~^admin$~' => [\myproject\controllers\AdminController::class , 'view'],
    '~^user/(\d+)/account$~'=> [\myproject\controllers\AccountController::class , 'view'],
    '~^photos/add$~'=> [\myproject\controllers\PhotoController::class , 'photoAdd'],
    ];