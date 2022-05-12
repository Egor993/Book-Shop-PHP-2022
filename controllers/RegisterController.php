<?php

use App\Models\Users;
use App\Components\User;

$name = '';
$email = '';
$result = false;
$role = 'user';
$errors = [];

if (isset($_POST['submit'])) {
    $name = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password1 = strip_tags($_POST['password1']);
    $password2 = strip_tags($_POST['password2']);

    // Валидация полей
    if (!User::checkName($name)) {
        $errors[] = 'Имя не должно быть короче 2-х символов';
    }

    if (!User::checkEmail($email)) {
        $errors[] = 'Неправильный email';
    }

    if (!User::checkPassword($password1)) {
        $errors[] = 'Пароль не должен быть короче 6-ти символов';
    }

    if ($password1 != $password2) {
        $errors[] = 'Пароли не совпадают';
    }

    if (Users::isNameExists($name)) {
        $errors[] = 'Такое имя пользователя уже используется';
    }

    if (Users::isEmailExists($email)) {
        $errors[] = 'Такой email уже используется';
    }

    if (!$errors) {
        $user = Users::create([
            'name' => $name,
            'email' => $email,
            'password' => $password1,
            'role' => $role,
            'image' => 'unnamed.jpg',
        ]);

        User::auth($name);
        $result = true;
    }
}

$smarty = new Smarty();
$smarty->assign('result', $result);
$smarty->assign('name', $name);
$smarty->assign('email', $email);
$smarty->assign('errors', $errors);
$smarty->display(ROOT.'/views/user/register.tpl');