<?php

require __DIR__ . '/auth.php';

if (getUserLogin() !== null) {
    setcookie('login', '', time() - 10, '/');
    setcookie('password', '', time() - 10, '/');
    header('location: /index.php');
} else {
    header('location: /index.php');
}
