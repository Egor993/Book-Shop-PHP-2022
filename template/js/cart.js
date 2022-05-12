$(function() {

	$('.clear').click(function(e) {
		e.preventDefault()
		$.ajax({
			type: "POST",
			url: "/cart",
			data: 'action=clearOrders',
			success: function() {
				changeData('clear')
			},
			error: function (error) {
				console.error(error);
			}
		});
	});

	$('.delete').click(function(e) {
		let chosen = $(this),
			id = chosen.attr('data-order');

		$.ajax({
			type: "POST",
			url: "/cart",
			data: 'id='+ id + '&action=deleteOrder',
			success: function(){
				changeData('delete', id)
			},
			error: function (error) {
				console.error(error);
			}
		});
	});

	$('.chg-quantity').click(function(e) {
		let chosen = $(this),
			id = chosen.attr('data-id'),
			action = chosen.attr('data-action')

		$.ajax({
			type: "POST",
			url: "/cart",
			data: 'id='+ id + '&action='+ action,
			success: function(){
				changeData(action, id)
			},
			error: function (error) {
				console.error(error);
			}
		});
	})

	function changeData(option, id = null) {
		let totalProducts = $('.total-products'),
			totalPrice = $('.total-price'),
			cartCount = $('#cart-count'),
			count,
			price,
			computedPrice;
		if (id !== null) {
			count = $(".count[data-id='" + id +"']");
			price = parseInt($(".price[data-id='" + id +"']").text());
			computedPrice = $(".computed-price[data-id='" + id +"']");
		}

		switch(option) {
			case 'clear':
				clearGeneralInfo()
				break;
			case 'delete':
				totalPrice.text(parseInt(totalPrice.text()) - price)
				totalProducts.text(parseInt(totalProducts.text()) - 1)
				$(".product[data-order='" + id +"']").remove();

				if (!$('.product').text()) {
					clearGeneralInfo()
				}

				break;
			case 'addProduct':
				computedPrice.text(parseInt(computedPrice.text()) + price);
				count.text(parseInt(count.text()) + 1);
				totalPrice.text(parseInt(totalPrice.text()) + price)
				totalProducts.text(parseInt(totalProducts.text()) + 1)
				cartCount.text(parseInt(cartCount.text()) + 1)
				break
			case 'decreaseProduct':
				computedPrice.text(parseInt(computedPrice.text()) - price);
				count.text(parseInt(count.text()) - 1);
				totalPrice.text(parseInt(totalPrice.text()) - price)
				totalProducts.text(parseInt(totalProducts.text()) + -1)
				cartCount.text(parseInt(cartCount.text()) - 1)

				if (parseInt(count.text()) === 0) {
					$(".product[data-order='" + id +"']").remove();
					if (!$('.product').text()) {
						clearGeneralInfo()
					}
				}

				break;
		}
	}
	function clearGeneralInfo() {
		$('.information-fields').hide();
		$('.total-price').text(0);
		$('.total-products').text(0);
		$('#cart-count').hide();
	}
})