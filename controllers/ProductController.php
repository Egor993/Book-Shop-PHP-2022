<?php

use App\Models\Products;
use App\Models\Users;
use App\Models\Comments;
use App\Models\Genres;

$id = $_GET['id'];

if (!$id) {
    header('Location: /');
}

$genres = Genres::all();
$latestProducts = Products::getLatestProducts();
$product = Products::where('id', $id)->first() ;

if (!$product) {
    header('Location: /');
}

$selectedGenres = $_GET['genres'] ?? '';
$selectedGenresArr = explode(",", $selectedGenres);
$errors = [];

if (isset($_POST['submit']) && isset($_SESSION['user'])) {
    $comment = $_POST['comment'];

    if (strlen($comment) > 500) {
        $errors[] = 'Вы превысили максимальное кол-во символов';
    }

    if (!$errors) {
        $name = $_SESSION['user'];
        $user = Users::where('name', $name)->first();
        Comments::create([
            'product_id' => $id,
            'user_id' => $user->id,
            'text' => $comment,
        ]);
        header("Location: /product?id=$id");
    }
}

$comments = Comments::query()
    ->join('users', 'user_id', '=', 'users.id')
    ->where('product_id', '=', $id)
    ->get();

$productGenres = Products::query()
    ->select('genres.name')
    ->join('products-genres as pg', 'products.id', '=', 'pg.id_product')
    ->join('genres', 'genres.id', '=', 'pg.id_genre')
    ->where('pg.id_product', $id)
    ->get();

$smarty = new Smarty();
$smarty->assign('product', $product);
$smarty->assign('productGenres', $productGenres);
$smarty->assign('comments', $comments);
$smarty->assign('errors', $errors);
$smarty->assign('genres', $genres);
$smarty->assign('selectedGenres', $selectedGenres);
$smarty->assign('selectedGenresArr', $selectedGenresArr);
$smarty->assign('latestProducts', $latestProducts);
$smarty->display(ROOT.'/views/product/index.tpl');