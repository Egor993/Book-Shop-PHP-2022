<?php

// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));

require_once(ROOT.'/application/vendor/autoload.php');

// 3. Установка соединения с БД
$DB = new App\Components\Database;

// 4. Вызор Router
$router = new App\Components\Router;
$router->run();