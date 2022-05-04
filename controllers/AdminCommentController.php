<?php

/**
 * Контроллер AdminOrderController
 * Управление заказами в админпанели
 */
class AdminCommentController extends AdminBase
{

    /**
     * Action для страницы "Управление заказами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        if (isset($_POST['_selected_action'])) {
            foreach($_POST['_selected_action'] as $id){
                Product::deleteCommentById($id);
            }
        }

        $comments = Product::viewComments();
        
        // Подключаем вид
        require_once(ROOT . '/views/admin_comment/index.php');
        return true;
    }

}
