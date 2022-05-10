<?php

use App\Models\Products;
use App\Models\Orders;
use App\Models\Users;
use App\Components\Cart;
use App\Components\Captcha;
use App\Components\User;

$productsInCart = Cart::getProducts();
$errors = [];
$user = isset($_SESSION['user']) ? Users::where('name', $_SESSION['user'])->first() : "";
$userName = "";
$userPhone = "";
$userComment = "";
$userId = $user ? $user->id : "";
$result = "";

// Если товаров нет, отправляем пользователи искать товары на главную
if ($productsInCart == false) {
    header("Location: /");
}

// Обработка формы
if (isset($_POST['submit'])) {

    $userName = strip_tags($_POST['userName']);
    $userPhone = strip_tags($_POST['userPhone']);
    $userComment = htmlspecialchars($_POST['userComment']);

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

    if (!$errors) {
        $result = Orders::create([
            'user_name' => $userName,
            'user_phone' => $userPhone,
            'user_comment' => $userComment,
            'user_id' => $userId,
            'products' => json_encode($productsInCart)
        ]);

        if ($result) {
            Cart::clear();
        }
    }
}

$products = Products::whereIn('id', array_keys($productsInCart))->get();

$totalQuantity = Cart::countItems();
$totalPrice = Cart::getTotalPrice($products);

// Подключение капчи
$captcha = Captcha::getCaptcha();
$captchaImage = $captcha->inline();
$_SESSION['captcha'] = $captcha->getPhrase();

$smarty = new Smarty();
$smarty->assign('products', $products);
$smarty->assign('errors', $errors);
$smarty->assign('name', $userName);
$smarty->assign('phone', $userPhone);
$smarty->assign('comment', $userComment);
$smarty->assign('result', $result);
$smarty->assign('totalQuantity', $totalQuantity);
$smarty->assign('totalPrice', $totalPrice);
$smarty->assign('captchaImage', $captchaImage);
$smarty->assign('productsInCart', $productsInCart);
$smarty->display(ROOT.'/views/payment/index.tpl');












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

