<?php

use App\Models\Users;
use App\Components\User;

$name = '';
$password = '';
$errors = [];

if (isset($_POST['submit'])) {
    $name = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    // Валидация полей
    if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче 6-ти символов';
    }

    // Проверяем существует ли пользователь
    $userExist = Users::isUserExist($name, $password);

    if (!$userExist) {
        // Если данные неправильные - показываем ошибку
        $errors[] = 'Неправильные данные для входа на сайт';
    } else {
        // Если данные правильные, запоминаем пользователя (сессия)
        User::auth($name);

        // Перенаправляем пользователя в закрытую часть - кабинет
        header("Location: /");
    }
}

$smarty = new Smarty();
$smarty->assign('name', $name);
$smarty->assign('errors', $errors);

$smarty->display(ROOT.'/views/user/login.tpl');