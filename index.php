<?php

// FRONT COTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/application/vendor/autoload.php');
require_once(ROOT.'/captcha/vendor/autoload.php');
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/libs/Smarty.class.php');
require_once(ROOT.'/application/app/Models/Database.php');
require_once(ROOT . '/application/app/Models/BaseModel.php');
require_once(ROOT . '/application/app/Models/Products.php');
require_once(ROOT . '/application/app/Models/Users.php');

//require_once(ROOT . '/entries/CartEntry.php');

// 3. Установка соединения с БД

use Models\Database;
$DB = new Database();

// 4. Вызор Router

$router = new Router();
$router->run();