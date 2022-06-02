<?php

namespace App\Components;

class User
{
    public static function auth($name): void
    {
        $_SESSION['user'] = $name;

    }

    public static function exit(): void
    {
        unset($_SESSION['user']);

    }

    public static function checkPhone($phone): bool
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function isGuest(): bool
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    public static function checkName($name): bool
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
    public static function checkPassword($password): bool
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}
