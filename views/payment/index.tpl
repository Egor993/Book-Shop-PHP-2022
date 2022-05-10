{include file="{ROOT}/views/include/header.tpl"}
{if !$result}
	<form action="#" method="post">
	 <div class="row">
		<div class="col-lg-6">
			<div class="box-element" id="form-wrapper">
				<form id="form">
					<div id="user-info">
						<div class="form-field">
							<p>Данные заказчика:</p>
							<input required class="form-control" type="text" name="userName" placeholder="Имя.." value="{$name}">
						</div>
					</div>

					<div id="shipping-info">
						<hr>

						<hr>
						<div class="form-field">
							<input class="form-control" type="text" name="userPhone" placeholder="Телефон.." value="{$phone}">
						</div>
						<div class="form-field">
							<input class="form-control" type="text" name="userComment" placeholder="Комментарий.." value="{$comment}">
						</div>

					</div>

					<hr>
					<div class="form-field">
					   <img src="{$captchaImage}" height="50">
					</div>
						<div class="form-field">
							<input name="code" type="text" class="form-control" id="code" placeholder="Капча...">
						</div>
					<br><br>
					{if $errors}
						<ul class="alert alert-danger">
							{foreach $errors as $error}
								<li>{$error}</li>
							{/foreach}
						</ul>
					{/if}
					<button type="submit" name="submit" class ="btn btn-success btn-block" value='Send' autofocus>Отправить</button>
				</form>
			</div>
		</div>
	</form>


		<div class="col-lg-6">
			<div class="box-element">
				<a  class="btn btn-outline-dark" href="../../index.php">&#x2190; Вернуться в корзину</a>
				<hr>
				<h3>Общая информация</h3>
				<hr>
				{foreach $products as $product}
					<div class="cart-row">
						<div style="flex:2"><img class="row-image" src="/template/images/{$product->image}"></div>
						<div style="flex:2"><a href="../../index.php">{$product->name}</a></div>
						<div style="flex:1"><p>{$product->price} руб</p></div>
						<div style="flex:1"><p>x{$productsInCart[$product->id]} шт</p></div>
					</div>
				{/foreach}
				<h5>Кол-во: {$totalQuantity}</h5>
				<h5>Общая стоимость: {$totalPrice} руб</h5>
			</div>
		</div>
	</div>
{else}
	<br>
	<div class="p-3 mb-2 bg-success text-white">Заказ оформлен, наш менеджер скоро с вами свяжется</div>
	<br>
{/if}
