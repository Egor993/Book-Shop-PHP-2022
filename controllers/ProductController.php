<?php

use App\Models\Products;
use App\Models\Users;
use App\Models\Comments;
use App\Models\Genres;

$id = ($_GET['id']) ?? header('Location: /');
$genres = Genres::all();;
$latestProducts = Products::getLatestProducts();
$product = Products::where('id', $id)->first();
if (!$product){
    header('Location: /');
}
$errors = [];

$selectedGenres = $_GET['genres'] ?? '';
$selectedGenresArr = explode(",", $selectedGenres);

// Если пользователь оставил комментарий, то записать это в сессию и установить комментарий для книги
if (isset($_POST['submit'])) {
    // Получаем экранированный комментарий от пользователя
    $comment = htmlspecialchars($_POST['comment']);
    if (strlen($comment) > 500) {
        $errors[] = 'Вы превысили максимальное кол-во символов';
    }
    if (!$errors) {
        // Получить данные пользователя для установки в БД комментария
        $name = $_SESSION['user'];
        $user = Users::where('name', $name)->first();
        Comments::create([
            'product_id' => $id,
            'user_id' => $user->id,
            'text' => $comment,
        ]);
    }
}

$comments = Comments::query()
    ->join('users', 'user_id', '=', 'users.id')
    ->where('product_id', '=', $id)
    ->get();

$productGenres = Products::query()
    ->select('genres.name')
    ->join('products-genres', 'products.id', '=', 'products-genres.id_product')
    ->join('genres', 'genres.id', '=', 'products-genres.id_genre')
    ->where('products-genres.id_product', $id)
    ->get();

$smarty = new Smarty();
$smarty->assign('product', $product);
$smarty->assign('productGenres', $productGenres);
$smarty->assign('comments', $comments);
$smarty->assign('errors', $errors);
$smarty->assign('genres', $genres);
$smarty->assign('latestProducts', $latestProducts);
$smarty->assign('selectedGenres', $selectedGenres);
$smarty->assign('selectedGenresArr', $selectedGenresArr);
$smarty->display(ROOT.'/views/product/index.tpl');