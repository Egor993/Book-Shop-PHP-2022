<?php

use Models\Products;

$page = $_GET['page'] ?? 1;
$genre = $_GET['genre'] ?? '';

$productsQuery = Products::query();

if ($genre) {
    $productsQuery
        ->where('genre', $genre);
}

$search = $_GET['search'] ?? '';
if ($search) {
    $productsQuery
        ->where('name', 'LIKE', "%{$search}%");
}

$pagination = new Pagination($totalEntries = count($productsQuery->get()));
$totalPages = $pagination->getTotalPages();

$productsOnPage = $productsQuery
    ->skip(Pagination::LIMIT * ($page -1))
    ->take(Pagination::LIMIT)
    ->get();

$genres = GenresList::getGenresList();

$smarty = new Smarty();
$smarty->assign('products', $productsOnPage);
$smarty->assign('totalPages', $totalPages);
$smarty->assign('genres', $genres);
$smarty->assign('genre', $genre);
$smarty->assign('search', $search);
$smarty->display(ROOT.'/views/site/index.tpl');




class SiteController {

	public function actionIndex($page = null) {
//	// Если перешли на главную страницу - обнуляем сессии фильтра и поиска
        if ($page == null) {
//            unset($_SESSION['search']);
//            unset($_SESSION['genre']);
//            unset($_SESSION['rating']);
            $page = 1;
        }
//        // Если был применен любой фильтр или поиск - сохраняем запрос в сессию, чтобы использовать на других страницах (page-1,2...)
//        if (isset($_POST['search'])) {
//
//            $_SESSION['search'] = htmlspecialchars($_POST['search']);
//        }
//
//        if (isset($_POST['genre'])) {
//
//            $_SESSION['genre'] = $_POST['genre'];
//        }
//
//        if (isset($_POST['rating'])) {
//
//            $_SESSION['rating'] = $_POST['rating'];
//        }
//        // Поиск
//        if (isset($_SESSION['search'])) {
//
//            $latestProducts = Product::getProductsByWord($page, $_SESSION['search']);
//            $total = Product::getTotalProductsByWord($_SESSION['search']);
//        }
//
//        // Фильтр жанра
//        else if (isset($_SESSION['genre'])) {
//
//            $latestProducts = Product::getProductsByGenre($page, $_SESSION['genre']);
//            $total = Product::getTotalProductsByGenre($_SESSION['genre']);
//        }
//        // Фильтр рейтинга
//        else if (isset($_SESSION['rating'])) {
//
//            $latestProducts = Product::getProductsByRating($page, $_SESSION['rating']);
//            $total = Product::getTotalProductsByRating($_SESSION['rating']);
//        }
//
//	else {
		$latestProducts = Product::getLatestProducts($page);
		$total = Product::getTotalProducts();
//	}
	// Разбивает товары на страницы (page-1,2...)
	$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

	// Берет последние 3 добавленные товара
	$lastAdded = Product::getLastAdded();

	require_once(ROOT . '/views/site/index.tpl');

	return true;

	}

}
