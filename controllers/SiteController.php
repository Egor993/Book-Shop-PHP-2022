<?php

use App\Models\Products;
use App\Models\Genres;
use App\Components\Pagination;

$page = $_GET['page'] ?? 1;
$selectedGenres = $_GET['genres'] ?? '';
$selectedGenresArr = explode(",", $selectedGenres);

$productsQuery = Products::query()
    ->select('products.id as id', 'products.image', 'products.name', 'products.price');

if ($selectedGenres) {
    $productsQuery
        ->join('products-genres as pg', 'id', '=', 'pg.id_product')
        ->whereIn('pg.id_genre', $selectedGenresArr)
        ->groupBy('id');
}

$search = $_GET['search'] ?? '';
if ($search) {
    $productsQuery->where('name', 'LIKE', "%{$search}%");
}

$pagination = new Pagination($totalEntries = count($productsQuery->get()));
$totalPages = $pagination->getTotalPages();

$productsOnPage = $productsQuery
    ->skip(Pagination::LIMIT * ($page -1))
    ->take(Pagination::LIMIT)
    ->get();

$genres = Genres::all();

$latestProducts = Products::getLatestProducts();

$smarty = new Smarty();
$smarty->assign('products', $productsOnPage);
$smarty->assign('totalPages', $totalPages);
$smarty->assign('genres', $genres);
$smarty->assign('selectedGenres', $selectedGenres);
$smarty->assign('selectedGenresArr', $selectedGenresArr);
$smarty->assign('search', $search);
$smarty->assign('latestProducts', $latestProducts);
$smarty->display(ROOT.'/views/site/index.tpl');