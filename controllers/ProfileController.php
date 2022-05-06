<?php

use Models\Users;

if (User::isGuest()) {
    header("Location: /login");
}
// Получаем данные пользователя
$name = $_SESSION['user'];
$errors = [];

// Проверяем загрузил пользователь фотографию или нет
if ((isset($_FILES['image'])) and ($_FILES['image']['name'] != '')){
    $image_name = '';
    // Настроки загружаемого файла
    $types = array('image/png', 'image/jpeg');
    $size = 1024000;
    // Проверяем тип файла
    if (!in_array($_FILES['image']['type'], $types))	{
        $errors[] = 'Запрещённый тип файла.';
    }
    // Проверяем размер файла
    else if ($_FILES['image']['size'] > $size){
        $errors[] = 'Слишком большой размер файла.';
    }
    else {
        // Изменяем пропорции загруженной фотографии под стандартные
        $image_name = Image::resize($_FILES['image']);
        // Добавляем название файла фото в БД
        Users::where('name', $name)->update(['image' => $image_name]);
        // Копируем файл фото из временной папки и удаляем его оттуда
        copy('template/images/tmp/' . $image_name, 'template/images/profile/' . $image_name);
        unlink('template/images/tmp/' . $image_name);
    }
}

$user = Users::where('name', $name)->first();

$smarty = new Smarty();
$smarty->assign('user', $user);
$smarty->assign('errors', $errors);
$smarty->display(ROOT.'/views/profile/index.tpl');

//
//class ProfileMainController {
//
//	public function actionIndex() {
//		// Если пользователь не авторизировался - послать на страницу входа
//		if (User::isGuest()) {
//				header("Location: /login");
//		}
//		// Получаем данные пользователя
//		$name = $_SESSION['user'];
//		$data = User::getUserData($name);
//		$image_name = $data['image'];
//
//		// Проверяем загрузил пользователь фотографию или нет
//		if ((isset($_FILES['image'])) and ($_FILES['image']['name'] != '')){
//			// Настроки загружаемого файла
//			$types = array('image/png', 'image/jpeg');
//			$size = 1024000;
//			// Проверяем тип файла
//			if (!in_array($_FILES['image']['type'], $types))	{
//				$img_error = 'Запрещённый тип файла.';
//			}
//			// Проверяем размер файла
//			else if ($_FILES['image']['size'] > $size){
//				$img_error = 'Слишком большой размер файла.';
//			}
//			else {
//				// Изменяем пропорции загруженной фотографии под стандартные
//				$image_name = Image::resize($_FILES['image']);
//				// Добавляем название файла фото в БД
//				User::setImage($name, $image_name);
//				User::setImageComment($name, $image_name);
//				// Копируем файл фото из временной папки и удаляем его оттуда
//				copy('template/images/tmp/' . $image_name, 'template/images/profile/' . $image_name);
//				unlink('template/images/tmp/' . $image_name);
//			}
//		}
//
//		require_once(ROOT . '/views/profile/index.tpl');
//
//		return true;
//	}
//
//	public function actionEdit() {
//		// Если пользователь не авторизировался - послать на страницу входа
//		if (User::isGuest()) {
//			header("Location: /login");
//		}
//		// Получаем данные пользователя
//		$name = $_SESSION['user'];;
//		$data = User::getUserData($name);
//		$image_name = $data['image'];
//
//		if (isset($_FILES['image'])){
//			// Настроки загружаемого файла
//			$types = array('image/png', 'image/jpeg');
//			$size = 1024000;
//			// Проверяем тип файла
//			if (!in_array($_FILES['image']['type'], $types)) {
//				$img_error = 'Запрещённый тип файла.';
//			}
//			// Проверяем размер файла
//			else if ($_FILES['image']['size'] > $size) {
//				$img_error = 'Слишком большой размер файла.';
//			}
//			else {
//				// Изменяем пропорции загруженной фотографии под стандартные
//				$image_name = Image::resize($_FILES['image']);
//				// Добавляем название файла фото в БД
//				User::setImage($name, $image_name);
//				User::setImageComment($name, $image_name);
//				// Копируем файл фото из временной папки и удаляем его оттуда
//				copy('template/images/tmp/' . $image_name, 'template/images/profile/' . $image_name);
//				unlink('template/images/tmp/' . $image_name);
//			}
//		}
//
//		$result = false;
//
//		if (isset($_POST['submit'])) {
//			$password = $_POST['password1'];
//			$password2 = $_POST['password2'];
//
//			$errors = false;
//
//			if (!User::checkPassword($password)) {
//				$errors[] = 'Пароль не должен быть короче 6-ти символов';
//			}
//
//			if ($password == $data['password']) {
//				$errors[] = 'Старый пароль введен неверно';
//			}
//
//			if ($password != $password2) {
//				$errors[] = 'Пароли не совпадают';
//			}
//
//			if ($errors == false) {
//				$result = User::edit($name, $password);
//			}
//
//		}
//
//		require_once(ROOT . '/views/profile/edit.php');
//
//		return true;
//	}
//
//}
