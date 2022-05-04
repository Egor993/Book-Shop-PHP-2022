<?php

/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{

	/**
	 * Action для страницы "Управление товарами"
	 */
	public function actionIndex()
	{
		// Проверка доступа
		self::checkAdmin();
		// Удаление выбранных элементов
		if (isset($_POST['action'])){
			foreach($_POST['_selected_action'] as $id){
				Product::deleteProductById($id);
			}
		}

		// Получаем список товаров
		$productsList = Product::getProductsList();

		// Подключаем вид
		require_once(ROOT . '/views/admin_product/index.php');
		return true;
	}

	/**
	 * Action для страницы "Добавить товар"
	 */
	public function actionCreate()
	{
		// Проверка доступа
		self::checkAdmin();

		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Получаем данные из формы
			$options['name'] = $_POST['name'];
			$options['price'] = $_POST['price'];
			$options['author'] = $_POST['author'];
			$options['description'] = $_POST['description'];
			$options['image'] = $_FILES["image"]['name'];

			// Флаг ошибок в форме
			$errors = false;

			if ($errors == false) {
				// Если ошибок нет
				// Добавляем новый товар
				$id = Product::createProduct($options);

				// Если запись добавлена
				if ($id) {
					// Проверим, загружалось ли через форму изображение
					if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
						// Если загружалось, переместим его в нужную папке, дадим новое имя
						move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$options['image']}");
					}
				};

				// Перенаправляем пользователя на страницу управлениями товарами
				header("Location: /admin/products");
			}
		}

		require_once(ROOT . '/views/admin_product/create.php');
		return true;
	}

	/**
	 * Action для страницы "Редактировать товар"
	 */
	public function actionUpdate($id)
	{
		// Проверка доступа
		self::checkAdmin();

		// Получаем данные о конкретном заказе
		$product = Product::getProductById($id);

		// Обработка формы
		if (isset($_POST['submit'])) {


			// Если форма отправлена
			// Получаем данные из формы редактирования. При необходимости можно валидировать значения
			$options['name'] = $_POST['name'];
			$options['price'] = $_POST['price'];
			$options['author'] = $_POST['author'];
			$options['description'] = $_POST['description'];
			if ($_FILES["image"]['name'] == false) {
				$options['image'] = $product['image'];
			}
			else {
				$options['image'] = $_FILES["image"]['name'];
			}



			// Сохраняем изменения
			if (Product::updateProductById($id, $options)) {

				
				// Если запись сохранена
				// Проверим, загружалось ли через форму изображение
				if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
					

					// Если загружалось, переместим его в нужную папке, дадим новое имя
				   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$options['image']}");
				}
			}

			// Перенаправляем пользователя на страницу управлениями товарами
			header("Location: /admin/products");
		}

		require_once(ROOT . '/views/admin_product/update.php');
		return true;
	}

}
