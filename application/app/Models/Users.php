<?php

namespace Models;
use Models\BaseModel;

class Users extends BaseModel
{
    protected $table = "user";

    public static function isNameExists($name): bool
    {
        $name = self::where('name', $name)->first();
        if ($name) {
            return true;
        }
        return false;
    }

    public static function isEmailExists($email): bool
    {
        $email = self::where('email', $email)->first();
        if ($email) {
            return true;
        }
        return false;
    }

    public static function isUserExist($name, $password): bool
    {
        $user= self::where([
            ['name', '=', $name],
            ['password', '=', $password],
        ])
            ->first();
        if ($user) {
            return true;
        }
        return false;
    }
}