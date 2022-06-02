<?php

use App\Models\Users;
use App\Components\User;

$name = '';
$password = '';
$errors = [];

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Валидация полей
    if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче 6-ти символов';
    }

    if (!Users::isUserDataCorrect($name, $password)) {
        $errors[] = 'Неправильные данные для входа на сайт';
    } else {
        User::auth($name);
        header("Location: /");
    }
}

$smarty = new Smarty();
$smarty->assign('name', $name);
$smarty->assign('errors', $errors);
$smarty->display(ROOT.'/views/user/login.tpl');