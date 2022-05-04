<?php
return [
	
	'admin/orders/view/([0-9]+)' => 'adminOrder/view/$1',
	'admin/orders' => 'adminOrder/index',
	
    'admin/products/create' => 'adminProduct/create',
    'admin/products/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/products' => 'adminProduct/index',
    
    'admin/comments' => 'adminComment/index',

	'admin/users/view/([a-z]+)' => 'adminUser/view/$1',
    'admin/users' => 'adminUser/index',
    
	'admin' => 'admin/index',

	'product/([0-9]+)' => 'product/view/$1',

	'page-([0-9]+)' => 'site/index/$1',

	'register' => 'user/register',
	'login' => 'user/login',

	'profile/edit' => 'profile/edit',
	'profile' => 'profile/index',

	'cart/add/([0-9]+)' => 'cart/add/$1',
	'cart/decrease/([0-9]+)' => 'cart/decrease/$1',
	'cart/delete/([0-9]+)' => 'cart/delete/$1',
	'cart/clear' => 'cart/clear',
	'cart' => 'cart/index',

	'payment' => 'cart/payment',

	'exit' => 'user/exit', 
	'' => 'site/index', 
	
	];