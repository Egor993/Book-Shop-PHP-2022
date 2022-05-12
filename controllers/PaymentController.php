<?php

use App\Models\Products;
use App\Models\Orders;
use App\Models\Users;
use App\Components\Cart;
use App\Components\User;
use App\Components\Captcha;

$productsInCart = Cart::getProducts();
$user = isset($_SESSION['user']) ? Users::where('name', $_SESSION['user'])->first() : "";
$userName = "";
$userPhone = "";
$userComment = "";
$userId = $user ? $user->id : "";
$result = false;
$errors = [];

if ($productsInCart == false) {
    header("Location: /");
}

// Подключение капчи
$captcha = Captcha::getCaptcha();
$captchaImage = $captcha->inline();
$_SESSION['captcha'] = $captcha->getPhrase();

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $userPhone = $_POST['userPhone'];
    $userComment = $_POST['userComment'];

    if (!User::checkName($userName)) {
        $errors[] = 'Неправильное имя';
    }
    if (!User::checkPhone($userPhone)) {
        $errors[] = 'Неправильный телефон';
    }
    if ($_SESSION['captcha'] != $_POST['code']) {
        $errors[] = 'Вы не прошли капчу';
    }

    if (!$errors) {
        Orders::create([
            'user_name' => $userName,
            'user_phone' => $userPhone,
            'user_comment' => $userComment,
            'user_id' => $userId,
            'products' => json_encode($productsInCart)
        ]);

        Cart::clear();
        $result = true;
    }
}

$products = Products::whereIn('id', array_keys($productsInCart))->get();

$totalQuantity = Cart::countItems();
$totalPrice = Cart::getTotalPrice($products);

$smarty = new Smarty();
$smarty->assign('products', $products);
$smarty->assign('errors', $errors);
$smarty->assign('name', $userName);
$smarty->assign('phone', $userPhone);
$smarty->assign('comment', $userComment);
$smarty->assign('result', $result);
$smarty->assign('totalQuantity', $totalQuantity);
$smarty->assign('totalPrice', $totalPrice);
$smarty->assign('productsInCart', $productsInCart);
$smarty->assign('captchaImage', $captchaImage);
$smarty->display(ROOT.'/views/payment/index.tpl');