$(document).ready(function() {

	$('.clear').click(function(e) {
		e.preventDefault()
		debugger;
		$.ajax({
			type: "POST",
			url: "/cart",
			data: 'action=clearOrders',
			success: function() {
				$('.cart-row').remove()
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
				chosen.parents('.cart-row').remove()
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
			count;
		if (id !== null) {
			count = $(".count[data-id='" + id +"']");
		}

		switch(option) {
			case 'clear':
				totalPrice.text(' 0 ');
				totalProducts.text(' 0 ');
				break;
			case 'addProduct':
				count.text(parseInt(count.text()) + 1);
				break
			case 'decreaseProduct':
				count.text(parseInt(count.text()) - 1);
				break;
		}
	}
})

//
// const add = document.querySelectorAll('[data-add]'),
// 	decrease = document.querySelectorAll('[data-decrease]'),
// 	deleteItem = document.querySelectorAll('[data-delete]'),
// 	cartCount = document.querySelector('#cart-count');
// let id;
//
// function deleteOrder(){
// 	fetch('/cart/delete/'+id, { // Отправляет пост запрос на удаление заказа
// 		method: 'POST'
// 	})
// 	.then(response => {
// 		changeData(2);
// 		document.querySelector(`[data-order="${id}"`).remove(); // Удаляет поле заказа
// 	});
// }
//
// function changeData(option){
// 	let totalCost = document.querySelector('[data-total-cost]').innerHTML,
// 	price = document.querySelector(`[data-price="${id}"`).innerHTML,
// 	qty = document.querySelector(`[data-qty="${id}"`).innerHTML,
// 	total = document.querySelector('[data-total]').innerHTML,
// 	qtyNum = +qty.replace(/\D/g, '');
//
// 	if(option == 1){
// 		cartCount.innerHTML++; // Обновляет счетчик на сайте
// 	}else if(option == -1){
// 		cartCount.innerHTML--;
// 	}else {
// 		// Меняет поля информации по заказам
// 		document.querySelector('[data-total-cost]').innerHTML = 'Общая стоимость: <strong>' +
// 			(+totalCost.replace(/\D/g, '') - (qtyNum * +price.replace(/\D/g, ''))) + ' руб</strong>';
// 		document.querySelector('[data-total]').innerHTML = 'Товаров: '+ '<strong>'+ (+total.replace(/\D/g, '') -1) + '</strong>';
// 		return true;
// 	}
// 		qtyNum += option;
// 		if(qtyNum == 0) {
// 			return deleteOrder();
// 		}
// 	// Меняет поля информации по заказам
// 	document.querySelector(`[data-qty="${id}"`).innerHTML = qtyNum + 'шт.'; // +1 к кол-ву нужного заказа
// 	document.querySelector(`[data-cost="${id}"`).innerHTML = +price.replace(/\D/g, '') * qtyNum + ' руб';
// 	document.querySelector('[data-total-cost]').innerHTML = 'Общая стоимость: <strong>' +
// 		((+price.replace(/\D/g, '') * option) + +totalCost.replace(/\D/g, '')) + ' руб</strong>';
// }
//
// add.forEach((item) => { // Добавляет обработчик на клик по добавлению элемента в корзину
// 	item.addEventListener('click', (e) => {
// 		e.preventDefault();
// 		id = (item.getAttribute('data-id')); // Получает номер нужного заказа
// 		fetch('/cart/add/'+id, { // Отправляет пост запрос на добавление заказа
// 			method: 'POST'
// 		})
// 		  .then(response => changeData(1))
// 		  .catch(error => console.error(error));
// 	});
// });
//
// decrease.forEach((item) => {
// 	item.addEventListener('click', (e) => {
// 		e.preventDefault();
// 		id = (item.getAttribute('data-id')); // Получает номер нужного заказа
// 		fetch('/cart/decrease/'+id, { // Отправляет пост запрос на уменьшение кол-ва
// 			method: 'POST'
// 		})
// 		  .then(response => changeData(-1))
// 		  .catch(error => console.error(error));
// 	});
// });
//
// deleteItem.forEach((item) => {
// 	item.addEventListener('click', (e) => {
// 		e.preventDefault();
// 		id = (item.getAttribute('data-delete')); // Получает номер нужного заказа
// 		deleteOrder();
// 	});
// });
//
