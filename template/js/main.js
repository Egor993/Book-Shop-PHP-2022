$(function() {

	$('.genre').change(function (){
		let selectedGenres = $('.editContent').find(".genre:checked"),
			selectedGenresList = "";
		$.each(selectedGenres, function(index, value){
			if (index === 0) {
				selectedGenresList = selectedGenresList + value.id ;
			} else {
				selectedGenresList = selectedGenresList + ',' + value.id ;
			}
		});
		window.location.href = '/?genres=' + selectedGenresList;
	})

	$('.buybtn').click(function (e) {
		e.preventDefault();
		loadNotification()
		let cartCount = parseInt($('#cart-count').text());
		$('#cart-count').text(cartCount + 1);
		if (cartCount === 0) {
			$('#cart-count').show();
		}
		let id = $(this).attr('data-id');
		$.ajax({
			type: "POST",
			url: "/cart",
			data: 'id=' + id + '&action=addProduct',
			error: function (error) {
				console.error(error);
			}
		});
	})

	function loadNotification() {
		$('.action-notification').css('top', '10px');
		$('.action-notification').show();
		$('.action-notification').animate({
			"top": "110px"
		}, 150, "linear");
		setTimeout(function() {
			$('.action-notification').animate({
				"top": "0px"
			}, 150, "linear", function () {
				$('.action-notification').hide();
			})
		}, 3000);
	}
})