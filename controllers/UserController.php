<?php

class UserController {

    public function actionRegister() {
    	
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password1']);
            $password2 = strip_tags($_POST['password2']);
            $role = 'admin';

            $errors = false;
            
            // Валидация полей  
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($password != $password2) {
                $errors[] = 'Пароли не совпадают';
            }

            if (User::checkNameExists($name)) {
                $errors[] = 'Такое имя пользователя уже используется';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                $result = User::register($name, $email, $password, $role);
                User::auth($name);
            }

        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $name = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $name = strip_tags($_POST['username']);
            $password = strip_tags($_POST['password']);
            
            $errors = false;
                        
            // Валидация полей        
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($name, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($name);
                
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /"); 
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionExit()
    {

        unset($_SESSION['user']);

        header("Location: /login"); 

        return true;
    }

}
