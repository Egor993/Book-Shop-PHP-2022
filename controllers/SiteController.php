<?php

use App\Models\Products;
use App\Models\Genres;
use App\Components\Pagination;

$currentPage = $_GET['page'] ?? 1;
$search = $_GET['search'] ?? '';
$selectedGenres = $_GET['genres'] ?? '';
$selectedGenresArr = explode(",", $selectedGenres);
$genres = Genres::all();
$latestProducts = Products::getLatestProducts();

$productsQuery = Products::query()
    ->select('products.id', 'products.image', 'products.name', 'products.price');

if ($selectedGenres) {
    $productsQuery
        ->join('products-genres as pg', 'products.id', '=', 'pg.id_product')
        ->whereIn('pg.id_genre', $selectedGenresArr)
        ->groupBy('products.id');
}

if ($search) {
    $productsQuery->where('name', 'LIKE', "%{$search}%");
}

$totalEntries = count($productsQuery->get());

$pagination = new Pagination($totalEntries);
$totalPages = $pagination->getTotalPages();

$productsOnPage = $productsQuery
    ->skip(Pagination::LIMIT * ($currentPage -1))
    ->take(Pagination::LIMIT)
    ->get();

$smarty = new Smarty();
$smarty->assign('products', $productsOnPage);
$smarty->assign('totalPages', $totalPages);
$smarty->assign('genres', $genres);
$smarty->assign('selectedGenres', $selectedGenres);
$smarty->assign('selectedGenresArr', $selectedGenresArr);
$smarty->assign('search', $search);
$smarty->assign('latestProducts', $latestProducts);
$smarty->display(ROOT.'/views/site/index.tpl');