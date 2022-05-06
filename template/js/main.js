"use strict";

$('.buybtn').click(function(e) {
	e.preventDefault();
	let id = $(this).attr('data-id');
	debugger;
	$.ajax({
		type: "POST",
		url: "/cart",
		data: 'id='+ id + '&action=addProduct',
		success: function(){
			$('#cart-count').text(1);
		},
		error: function (error) {
			console.error(error);
		}
	});
})

// const addToCart = document.querySelectorAll('.buybtn');
// const cartCount = document.querySelector('#cart-count');
//
// addToCart.forEach((item) => {
// 	item.addEventListener('click', (e) => {
// 		e.preventDefault();
// 		let id = (item.getAttribute('data-id'));
// 		fetch('/cart/add/'+id, {
// 			method: 'POST'
// 		})
// 		  .then(response => {
// 			cartCount.innerHTML++;
// 		  })
// 		  .catch(error => console.error(error));
// 	});
// });
//
