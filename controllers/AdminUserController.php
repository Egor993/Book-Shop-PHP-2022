<?php

/**
 * Контроллер AdminUserController
 * Управление пользователями в админпанели
 */
class AdminUserController extends AdminBase
{

    /**
     * Action для страницы "Управление пользователями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Удаление выбранных элементов
        if (isset($_POST['_selected_action'])) {
            foreach($_POST['_selected_action'] as $id){
                User::deleteUserById($id);
            }
        }
        // Получаем список пользователей
        $users = User::getUsers();

        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }

    public function actionView($name) {
        // Проверка доступа
        self::checkAdmin();

        $user = User::getUserData($name);

        require_once(ROOT . '/views/admin_user/view.php');
        return true;
    }

}
