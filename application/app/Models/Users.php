<?php

namespace App\Models;
use App\Models\BaseModel;

class Users extends BaseModel
{
    protected $guarded = [];

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

    public static function isUserDataCorrect($name, $password): bool
    {
        $isPasswordCorrect = false;
        $user = self::where([
            ['name', '=', $name],
        ])
            ->first();
        if ($user) {
            $isPasswordCorrect = password_verify($password, $user->password);
        }
        if ($isPasswordCorrect) {
            return true;
        }
        return false;
    }
}