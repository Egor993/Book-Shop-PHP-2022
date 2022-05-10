<?php

use App\Components\Cart;
use App\Components\User;
use App\Models\Products;


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'clearOrders':
            Cart::clear();
            break;
        case 'deleteOrder':
            Cart::deleteProducts($_POST['id']);
            break;
        case 'addProduct':
            Cart::addProduct($_POST['id']);
            break;
        case 'decreaseProduct':
            Cart::decreaseProduct($_POST['id']);;
            break;
    }
}


$totalPrice = 0;
$products = [];

// Получаемм данные из корзины
$productsInCart = Cart::getProducts();

if ($productsInCart) {
    // Получаем полную информацию о товарах для списка
    $productsIds = array_keys($productsInCart);
    $products = Products::whereIn('id', $productsIds)->get();

    // Получаем общую стоимость товаров
    $totalPrice = Cart::getTotalPrice($products);
}

$totalProducts = $productsInCart ? array_sum($productsInCart) : 0;

$smarty = new Smarty();
$smarty->assign('products', $products);
$smarty->assign('productsInCart', $productsInCart);
$smarty->assign('totalProducts', $totalProducts);
$smarty->assign('totalPrice', $totalPrice);
$smarty->display(ROOT.'/views/cart/index.tpl');












class CartController {

    public function actionIndex() {

    }

    public function actionAdd($id) {
        // Добавляем товар в корзину
        Cart::addProduct($id);
    }

    public function actionDecrease($id) {
        // Добавляем товар в корзину
        Cart::decreaseProduct($id);
    }

    public function actionDelete($id) {
        // Удаляем заданный товар из корзины
        Cart::deleteProducts($id);
    }

    public function actionClear() {
        // Удаляем все товары из корзины
        Cart::clear();
    }

    public function actionPayment() {

        $productsInCart = Cart::getProducts();

        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }
        // Берем список продуктов
        $productsIds = array_keys($productsInCart);
//        $products = Product::getProdustsByIds($productsIds);

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
//        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Количество товаров
        $totalQuantity = Cart::countItems();

        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;

        // Статус успешного оформления заказа
        $result = false;

        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Получаем информацию о пользователе
            $user = User::getUserData($userName);
        }
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $data = User::getUserData($userName);
            $userId = $data['id'];
            $userName = strip_tags($_POST['userName']);
            $userPhone = strip_tags($_POST['userPhone']);
            $userComment = htmlspecialchars($_POST['userComment']);

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if ($_SESSION['captcha'] != htmlspecialchars($_POST['code'])){
                $errors[] = 'Вы не прошли капчу';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
                // Очищаем корзину
                if ($result) {
                    Cart::clear();
                    header("Location: /");
                }
            }
        }

        // Подключение капчи и ее настройка
        $phraseBuilder = new \Gregwar\Captcha\PhraseBuilder(5, '0123456789');
        $captcha = new Gregwar\Captcha\CaptchaBuilder(null, $phraseBuilder);
        $captcha->setBackgroundColor(255, 255, 255);
        $captcha->setIgnoreAllEffects(true);
        $captcha->build(150, 40);
        $image = $captcha->inline();
        $_SESSION['captcha'] = $captcha->getPhrase();

        require_once(ROOT . '/views/cart/index.tpl');


        return true;
    }
}

