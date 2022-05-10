{include file="{ROOT}/views/include/header.tpl"}
<div class="row">
	<div class="col-lg-12">
		<div class="box-element">
			<a  class="btn btn-outline-dark" href="/">&#x2190; Продолжить покупки</a>
			<br>
			<br>
			<table class="table">
				<tr>
					<th style="font-size:18px;">Товаров: <span class="total-products">{$totalProducts}</span></th>
					<th style="font-size:18px;">Общая стоимость: <span class="total-price">{$totalPrice}</span> руб </th>
					<th>
						<a style="float:right; margin:5px;" class="btn btn-success" href="/payment/" autofocus>Оплата</a>
						<a  style="float:right; margin:5px;" class="btn btn-secondary clear" href="#">Очистить</a>
					</th>
				</tr>
			</table>
		</div>
		<br>
		{if $totalProducts}
			<div class="box-element information-fields">
				<div class="cart-row">
					<div style="flex:2"></div>
					<div style="flex:2"><strong>Товар</strong></div>
					<div style="flex:1"><strong>Цена</strong></div>
					<div style="flex:1"><strong>Кол-во</strong></div>
					<div style="flex:1"><strong>Стоимость</strong></div>
					<div style="flex:1"><strong>Удалить</strong></div>
				</div>
				{foreach $products as $product}
					<div class="cart-row product" data-order='{$product->id}'>
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
								<span class="price" data-id='{$product->id}'>{$product->price}</span> руб

							</p>
						</div>
						<div style="flex:1">
							<p class="quantity">
								<span class="count" data-id='{$product->id}'>{$productsInCart[$product->id]}</span>шт.
							</p>
							<div class="quantity">
								<img data-action="addProduct" data-id='{$product->id}' class="chg-quantity update-cart" src="/template/images/arrow-up.png">
								<img data-action="decreaseProduct" data-id='{$product->id}' class="chg-quantity update-cart" src="/template/images/arrow-down.png">
							</div>
						</div>
						<div style="flex:1">
							<p data-cost='{$product->id}'>
								<span class="computed-price" data-id='{$product->id}'>{$productsInCart[$product->id] * $product->price}</span> руб

							</p>
						</div>
						<div style="flex:1">
							<p class='delete' data-order='{$product->id}'><img class="chg-quantity update-cart" src="/template/images/delete.png"></p>
							</a>
						</div>
					</div>
				{/foreach}
			</div>
		{/if}
	</div>
</div>

<script src="/template/js/cart.js"></script>