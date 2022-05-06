<?php include ROOT . '/views/include/header.tpl'; ?>

<form action="#" method="post">
 <div class="row">
	<div class="col-lg-6">
		<div class="box-element" id="form-wrapper">
			<form id="form">
				<div id="user-info">
					<div class="form-field">
						<p>Данные заказчика:</p>
						<input required class="form-control" type="text" name="userName" placeholder="Имя..">
					</div>
				</div>
				
				<div id="shipping-info">
					<hr>
					
					<hr>
					<div class="form-field">
						<input class="form-control" type="text" name="userPhone" placeholder="Телефон..">
					</div>
					<div class="form-field">
						<input class="form-control" type="text" name="userComment" placeholder="Комментарий..">
					</div>

				</div>

				<hr>
				<div class="form-field">
                   <img src="<?php echo $image; ?>" height="50">
                </div>
                    <div class="form-field">
                        <input name="code" type="text" class="form-control" id="code" placeholder="Капча...">
                    </div>
				<br><br>
				<?php if (isset($errors) and is_array($errors)): ?>
            	<ul class="alert alert-danger">
	                <?php foreach ($errors as $error): ?>
	                    <li><?php echo $error;?></li>
	                <?php endforeach;?>
           		</ul>
            	<?php endif;?>
				<button type="submit", name="submit", class ="btn btn-success btn-block", value='Send' autofocus>Отправить</button>
			</form>
		</div>
	</div>
</form>		
	

	<div class="col-lg-6">
		<div class="box-element">
			<a  class="btn btn-outline-dark" href="/cart">&#x2190; Вернуться в корзину</a>
			<hr>
			<h3>Общая информация</h3>
			<hr>
			<?php foreach ($products as $product): ?>
				<div class="cart-row">
					<div style="flex:2"><img class="row-image" src="template/images/<?php echo $product['image']?>"></div>
					<div style="flex:2"><a href="/book_list/krestnyj-otec/"><?php echo $product['name']; ?></a></div>
					<div style="flex:1"><p><?php echo $product['price']; ?> руб</p></div>
					<div style="flex:1"><p>x<?php echo $productsInCart[$product['id']]; ?> шт</p></div>
				</div>
			<?php endforeach; ?>
			<h5>Кол-во: <?php echo $totalQuantity; ?></h5>
			<h5>Общая стоимость: <?php echo $totalPrice; ?> руб</h5>
		</div>
	</div>
</div>
