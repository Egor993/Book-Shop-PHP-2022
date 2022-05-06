<?php

class User {

//    public static function register($name, $email, $password, $role) {
//
//        $db = Db::getConnection();
//
//        $sql = 'INSERT INTO user (name, email, password, role, image) '
//                . 'VALUES (:name, :email, :password, :role, :image)';
//
//        $image = 'unnamed.jpg'; // Изображение по умолчанию
//        $role = 'admin';
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_STR);
//        $result->bindParam(':email', $email, PDO::PARAM_STR);
//        $result->bindParam(':password', $password, PDO::PARAM_STR);
//        $result->bindParam(':role', $role, PDO::PARAM_STR);
//        $result->bindParam(':image', $image, PDO::PARAM_STR);
//        return $result->execute();
//    }
//
//    public static function checkUserData($name, $password) {
//
//        $db = Db::getConnection();
//
//        $sql = 'SELECT * FROM user WHERE name = :name AND password = :password';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_INT);
//        $result->bindParam(':password', $password, PDO::PARAM_INT);
//        $result->execute();
//
//        $user = $result->fetch();
//        if ($user) {
//            return $user['id'];
//        }
//
//        return false;
//    }
//
//
//
//    public static function getUserData($name) {
//
//        $db = Db::getConnection();
//
//        $sql = 'SELECT * FROM user WHERE name = :name';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_INT);
//        $result->execute();
//
//        $user = $result->fetch();
//        if ($user) {
//
//            $arr = ['id' => $user['id'], 'name' => $user['name'], 'email' => $user['email'], 'password' => $user['password'], 'role' => $user['role'], 'image' => $user['image']];
//
//            return $arr;
//        }
//
//        return false;
//    }
//
//    public static function edit($name, $password) {
//
//        $db = Db::getConnection();
//
//        $sql = "UPDATE user
//            SET password = :password
//            WHERE name = :name";
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_STR);
//        $result->bindParam(':password', $password, PDO::PARAM_STR);
//        return $result->execute();
//    }

    public static function auth($name)
    {
        $_SESSION['user'] = $name;

    }

    public static function exit()
    {
        unset($_SESSION['user']);

    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
//    public static function checkEmailExists($email) {
//
//        $db = Db::getConnection();
//
//        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':email', $email, PDO::PARAM_STR);
//        $result->execute();
//
//        if($result->fetchColumn())
//            return true;
//        return false;
//    }
    
//	public static function checkNameExists($name) {
//
//        $db = Db::getConnection();
//
//        $sql = 'SELECT COUNT(*) FROM user WHERE name = :name';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_STR);
//        $result->execute();
//
//        if($result->fetchColumn())
//            return true;
//        return false;
//    }
//
//    public static function setImage($name, $image) {
//        $db = Db::getConnection();
//
//        $sql = "UPDATE user
//            SET image = :image
//            WHERE name = :name";
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_STR);
//        $result->bindParam(':image', $image, PDO::PARAM_STR);
//        return $result->execute();
//    }
//
//    public static function setImageComment($name, $image) {
//
//        $db = Db::getConnection();
//
//        $sql = "UPDATE comments
//            SET image = :image
//            WHERE name = :name";
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, PDO::PARAM_STR);
//        $result->bindParam(':image', $image, PDO::PARAM_STR);
//        return $result->execute();
//    }
//
//    public static function getUsers() {
//
//        $db = Db::getConnection();
//
//        $result = $db->query('SELECT * FROM user');
//        $users = array();
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $users[$i]['id'] = $row['id'];
//            $users[$i]['name'] = $row['name'];
//            $i++;
//        }
//        return $users;
//    }
//
//    public static function deleteUserById($id) {
//
//        $db = Db::getConnection();
//
//        $sql = 'DELETE FROM user WHERE id = :id';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':id', $id, PDO::PARAM_INT);
//        return $result->execute();
//    }
    
}
