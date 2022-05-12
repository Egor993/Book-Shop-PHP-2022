<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Book Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/template/css/bootstrap.css">

    <link rel="stylesheet" href="/template/css/style.css" type="text/css" media="all">

    <link href="/template/css/font-awesome.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
</head>

<body>
    <div id="page" class="page">
        <div class="main-banner bg bg1" id="home" >
            <header class="header">
                <div class="container-fluid px-lg-5">
                    <nav class="py-4">
                        <div id="logo">
                            <h1> <a href="/" class="editContent">Book Shop</a></h1>
                        </div>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop">
                        <ul class="menu mt-2">
                            <li><a href="/">Главная</a></li>
                            <li><a href="#">О магазине</a></li>
                            <li><a href="#">Контакты</a></li>
                            {if App\Components\User::isGuest()}
                                <li><a href="/register/">Регистрация</a></li>
                                <li><a href="/login/">Вход</a></li>
                            {else}
                                <li><a href="/profile/">Профиль</a></li>
                                <li><a href="/logout/">Выход</a></li>
                            {/if}
                            <li><a href="/cart/"><img src="/template/images/full-cart-light.png" height="40" alt=""/></a></li>
                            <span id='cart-count'>{App\Components\Cart::countItems()}</span>
                        </ul>
                    </nav>
                </div>
            </header>
            <div class="banner-info">
                <p class="editContent" >Чтение для ума — то же, что физические упражнения для тела</p>
                <h3 class="mb-4 editContent">Книги мира</h3>
            </div>
        </div>
    </div>
</body>

<script>
    if (parseInt($('#cart-count').text()) === 0) {
        $('#cart-count').hide();
    }
</script>