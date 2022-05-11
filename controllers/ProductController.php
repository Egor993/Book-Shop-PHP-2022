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
            'book_id' => $id,
            'user_id' => $user->id,
            'text' => $comment,
        ]);
    }
}

$comments = Comments::query()
    ->join('user', 'user_id', '=', 'user.id')
    ->where('book_id', '=', $id)
    ->get();

$productGenres = Products::query()
    ->select('genres.genre_name')
    ->join('product-genres', 'product.id', '=', 'product-genres.id_product')
    ->join('genres', 'genres.id', '=', 'product-genres.id_genre')
    ->where('product-genres.id_product', $id)
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








class ProductController {

	public function actionView($id) {
		// Получаем данные рейтинга
		$amount = Product::getRatingAmountById($id); // Общая сумма баллов
		$count = Product::getCountRatingById($id); // Кол-во проголосовавших

		// Если сумма баллов != 0, то вычисляем рейтинг и округялем
		if ($amount != 0) {
			$rating = ceil(($amount/$count)/0.5)*0.5;
		}
		else $rating = 0;

		unset($_SESSION[$id.'comment']);

		// Если пользователь проголосовал, то записать это в сессию и установить рейтинг для книги 
		if ((isset($_POST['rating'])) and (!(isset($_SESSION[$id.'i'])))) {

			$_SESSION[$id.'i'] = $_POST['rating'];
			
			Product::setRating($id, $_POST['rating'], $amount, $count);
			// Заполнить переменную $rating, чтобы потом показать после голосования
			if ($rating == 0) $rating = $_POST['rating']; 
		}

		// Если пользователь оставил комментарий, то записать это в сессию и установить комментарий для книги 
		if ((isset($_POST['submit'])) and (!(isset($_SESSION[$id.'comment'])))) {
			// Получаем экранированный комментарий от пользователя 
			$comment = htmlspecialchars($_POST['comment']);	
			if (strlen($comment) > 500) {
				$error = 'Вы превысили максимальное кол-во символов';
			}
			else {
				$_SESSION[$id.'comment'] = htmlspecialchars($_POST['comment']);
				// Получить данные пользователя для установки в БД комментария
				$name = $_SESSION['user'];
				$data = User::getUserData($name);
				$image_name = $data['image'];
				
				Product::addComment($id, $name, $comment, $image_name);
			}
		}
		// Получаем все комментарии к данной книге
		$comments = Product::viewCommentsByBook_id($id);

		// Берет последние 3 добавленные товара
		$lastAdded = Product::getLastAdded();
		
        $viewproduct = Product::getProductById($id);
        
		require_once(ROOT . '/views/product/index.tpl');


		return true;

	}

}

