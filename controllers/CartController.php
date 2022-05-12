<?php

use App\Components\Cart;
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