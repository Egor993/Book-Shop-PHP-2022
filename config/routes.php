<?php
return [
	'product/([0-9]+)' => 'product/view/$1',

	'register' => 'user/register',
	'login' => 'user/login',

	'profile/edit' => 'profile/edit',
	'profile' => 'profile/index',

	'cart' => 'cart/index',

	'payment' => 'cart/payment',

	'exit' => 'user/exit', 
	'' => 'site/index', 
	
	];