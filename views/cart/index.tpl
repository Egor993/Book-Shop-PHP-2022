{include file="{ROOT}/views/include/header.php"}
<div class="row">
	<div class="col-lg-12">
		<div class="box-element">
			<a  class="btn btn-outline-dark" href="/">&#x2190; Продолжить покупки</a>
			<br>
			<br>
			<table class="table">
				<tr>
					<th><h5 data-total>Товаров: <strong>{$totalProducts}</strong></h5></th>
					<th><h5 data-total-cost>Общая стоимость:<strong> {$totalPrice} руб</strong></h5></th>
					<th>
						<a style="float:right; margin:5px;" class="btn btn-success" href="../../../index.php" autofocus>Оплата</a>
						<a  style="float:right; margin:5px;" class="btn btn-secondary" href="cart/clear">Очистить</a>
					</th>
				</tr>
			</table>
		</div>
		<br>
		<div class="box-element">
			<div class="cart-row">
				<div style="flex:2"></div>
				<div style="flex:2"><strong>Товар</strong></div>
				<div style="flex:1"><strong>Цена</strong></div>
				<div style="flex:1"><strong>Кол-во</strong></div>
				<div style="flex:1"><strong>Стоимость</strong></div>
				<div style="flex:1"><strong>Удалить</strong></div>
			</div>
			{foreach $products as $product}
				<div class="cart-row" data-order='{$product->id}'>
					<div style="flex:2">
						<img class="row-image" src="/template/images/{$product->image}">
					</div>
					<div style="flex:2">
						<a href="/product/{$product->id}">
							{$product->name}
						</a>
					</div>
					<div style="flex:1">
						<p data-price='{$product->id}'>
							{$product->price} руб
						</p>
					</div>
					<div style="flex:1">
						<p class="quantity" data-qty='{$product->id}'>
							{$productsInCart[$product->id]}шт.
						</p>
						<div class="quantity">
							<img data-add class="chg-quantity update-cart" src="/template/images/arrow-up.png" data-id='{$product->id}'>
							<a href="/cart/decrease/{$product->id}" >
								<img data-decrease class="chg-quantity update-cart" src="/template/images/arrow-down.png" data-id='{$product->id}'>
							</a>
						</div>
					</div>
					<div style="flex:1"><p data-cost='{$product->id}'>{$productsInCart[$product->id] * $product->price} руб</p></div>
					<div style="flex:1">
						<p class='delete' data-order='{$product->id}'><img class="chg-quantity update-cart" src="/template/images/delete.png"></p>
						</a>
					</div>
				</div>
			{/foreach}
		</div>
	</div>
</div>
<h1 id="test1">Тестовое поле</h1>

<script src="/template/js/cart.js"></script>
