<?php

use App\Models\Users;
use App\Components\User;
use App\Components\Image;

if (User::isGuest()) {
    header("Location: /login");
}
// Получаем данные пользователя
$name = $_SESSION['user'];
$passErrors = [];
$imgErrors = [];
$isPassChanged = false;

// Проверяем загрузил пользователь фотографию или нет
if ((isset($_FILES['image'])) and ($_FILES['image']['name'] != '')){
    $image_name = '';
    // Настроки загружаемого файла
    $types = array('image/png', 'image/jpeg');
    $size = 1024000;
    // Проверяем тип файла
    if (!in_array($_FILES['image']['type'], $types))	{
        $imgErrors[] = 'Запрещённый тип файла';
    }
    // Проверяем размер файла
    else if ($_FILES['image']['size'] > $size){
        $imgErrors[] = 'Слишком большой размер файла';
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

if (isset($_POST['submit'])) {
    $isOldPasswordCorrect = $user->password == strip_tags($_POST['oldPassword']);
    $password1 = strip_tags($_POST['password1']);
    $password2 = strip_tags($_POST['password2']);

    if (!User::checkPassword($password1)) {
        $passErrors[] = 'Пароль не должен быть короче 6-ти символов';
    }

    if (!$isOldPasswordCorrect) {
        $passErrors[] = 'Старый пароль введен неверно';
    }

    if ($password1 != $password2) {
        $passErrors[] = 'Пароли не совпадают';
    }

    if (!$passErrors) {
        $user->password = $password1;
        $user->save();
        $isPassChanged = true;
    }
}

$smarty = new Smarty();
$smarty->assign('user', $user);
$smarty->assign('imgErrors', $imgErrors);
$smarty->assign('passErrors', $passErrors);
$smarty->assign('isPassChanged', $isPassChanged);
$smarty->display(ROOT.'/views/profile/index.tpl');