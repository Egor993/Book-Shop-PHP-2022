<?php

include_once ROOT. '/models/Product.php';

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
        
		require_once(ROOT . '/views/product/index.php');


		return true;

	}

}

