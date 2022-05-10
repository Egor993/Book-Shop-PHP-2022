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
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
</head>

<body>

<div class="action-notification" style="display: none">
    <div id="check-mark"></div> Товар успешно добавлен в корзину
</div>

<div id="page" class="page">
    <div class="main-banner inner bg bg1" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1><a href="/" class="editContent"
                               >Book Shop</a>
                        </h1>
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
                            <li><a href="/cart"><img src="/template/images/full-cart-light.png" height="40" alt=""/></a></li>
                            <span id='cart-count'>{App\Components\Cart::countItems()}</span>
                        </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
    </div>
</div>
    <!--//main-content-->
    <!---->
    <ol class="breadcrumb editContent">
        <li class="breadcrumb-item">
            <a href="/">Главная</a>
        </li>
        <li class="breadcrumb-item active editContent" style="outline: none; cursor: inherit;">
            Книга
        </li>
    </ol>
    <!---->
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4 editContent"
             style="outline: none; outline-offset: -2px; cursor: inherit; color: rgb(33, 37, 41); font-size: 16px; background-color: rgba(0, 0, 0, 0); font-family: Lato, sans-serif;">
        <div class="container py-md-3">
            <!-- top Products -->
             <div class="row">
                    <div class="side-bar col-lg-4">

                        <div class="search-bar w3layouts-newsletter">
                            <h3 class="sear-head editContent">Поиск книги</h3>
                            <form action="/" method="get" class="d-flex editContent" >
                                <input type="search" placeholder="Введите название..." name="search" class="form-control" required="">
                                <button class="btn1 btn" ><span class="fa fa-search" aria-hidden="true" ></span></button>
                            </form>
                        </div>
                        <!--preference -->
                        <div class="left-side my-4">
                            <h3 class="sear-head editContent">Жанры</h3>
                            <ul class="w3layouts-box-list">
                                {foreach $genres as $genre => $ruNameGenre}
                                    <li class="editContent">
                                        <a href="/?page=1&genre={$genre}">
                                            <button class="btn genre">{$ruNameGenre}</button>
                                        </a>
                                    </li>
                                {/foreach}
                            </ul>
                        </div>
                        <!-- // preference -->
                        <!-- //reviews -->
                        <!-- deals -->
                        <div class="deal-leftmk left-side">
                            <h3 class="sear-head editContent">Последние добавленные</h3>
                            {foreach $latestProducts as $product}
                                <div class="special-sec1 row mt-3 editContent" >
                                    <div class="img-deals col-md-4">
                                        <a href="/product?id={$product->id}">
                                            <img src="/template/images/{$product->image}" class="img-fluid" alt="" >
                                    </div>
                                    <div class="img-deal1 col-md-8">
                                        <h3 class="editContent" >{$product->name}</h3>
                                        <a href="moviesingle.html" class="editContent" ></a>
                                    </div>
                                    </a>
                                </div>
                            {/foreach}
                        </div>
                    <!-- //deals -->
                    <!-- //deals -->

                </div>
                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <div class="desc1-left col-md-6">
                            <img src="/template/images/{$product->image}" class="img-fluid" alt="">
                        </div>
                        <div class="desc1-right col-md-6 pl-lg-4">
                             <div class="item-info-product">
                                <h4>
                                    {$product->name}
                                </h4>
                                <h6>
                                    {$product->price} руб
                                </h6>            
                                <a href="#" class="buybtn" data-id='{$product->id}'>
                                    <span class="buybtn-text">
                                        Купить
                                    </span>
                                    <span class="buybtn-image">
                                        <span></span>
                                    </span>
                                </a>
                                </div>
                                <br>
                            <ul>
                            <li style="list-style: none"><span><b>Автор:</b> {$product->author}</span>
                                <li style="list-style: none"><span><b>Жанр:</b> {$genre}</span>
                                </li>

                                <div class="share-desc">
                                    <div class="share">
                                        <h4 class="editContent"
                                            style="outline: none; cursor: inherit;">
                                            Поделиться:</h4>
                                        <ul class="w3layouts_social_list list-unstyled">
                                            <li>
                                                <a href="#" class="w3pvt_facebook editContent"
                                                   style="outline: none; cursor: inherit;">
                                                <span class="fa fa-facebook-f"
                                                      style="outline: none; cursor: inherit;"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="w3pvt_twitter editContent"
                                                   style="outline: none; cursor: inherit;">
                                                <span class="fa fa-twitter"
                                                      style="outline: none; cursor: inherit;"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="w3pvt_dribble editContent"
                                                   style="outline: none; cursor: inherit;">
                                                <span class="fa fa-dribbble"
                                                      style="outline: none; cursor: inherit;"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    <div class="row sub-para-w3layouts mt-5">

                        <h3 class="shop-sing editContent" style="outline: none; cursor: inherit;">
                            О книге {$product->name}
                        </h3>
                        <p class="editContent" style="outline: none; cursor: inherit;">
                            {$product->description}
                        </p>
                        </p>
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="single-form-left">
                            <!-- contact form grid -->
                            <div class="contact-single">
                            <?php if(!(User::isGuest())): ?>
                                <h3 class="editContent" style="outline: none; cursor: inherit;">
                                    <span class="sub-tittle editContent"
                                          style="outline: none; cursor: inherit;"></span>Оставить отзыв</h3>
                            
                                <form action="#" method="post" class="mt-4">
                                    <div class="form-group editContent"
                                         style="outline: none; cursor: inherit;">
                                        <label for="contactcomment" class="editContent">Ваш комментарий</label>
                                        <textarea class="form-control border" rows="10" cols="90" 
                                                  id="contactcomment" required="" name='comment'></textarea>
                                    </div>
                                     <label for="contactcomment" class="editContent">Максимальная длина 500 символов *</label>
	                                <?php if (isset($error)): ?>
	                                <ul class="alert alert-danger">
	                                    <li><?php echo $error; ?></li>
	                                </ul>
	                            	<?php endif;?>
                                    <button type="submit" name="submit"
                                            class="mt-3 btn btn-success btn-block py-3"
                                            style="outline: none; cursor: inherit;">Отправить
                                    </button>
                                </form>
                                <?php else: ?>
                                    <div class="berrors">
                                        <b>Информация</b><br>
                                        Посетители, находящиеся в группе <b>Гости</b>, не могут оставлять комментарии 
                                        к данной публикации.
					                </div>
                                <?php endif;?>
                            </div>
                            
                            <!--  //contact form grid ends here -->
                        <?php foreach($comments as $comment): ?>
                        <div class="media py-5">
                            <img src="/template/images/profile/<?php echo $comment['image'] ?>" class="mr-3 img-fluid" alt="image" >
                            <div class="media-body mt-6">
                                <h5 class="mt-0 editContent"
                                    style="outline: none; cursor: inherit;"><?php echo $comment['name']; ?></h5>
                                <p class="mt-2 editContent">
                                    <?php echo $comment['comment']; ?>
                                </p>
                        </div>
                            </div>
                         <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
    <!-- footer -->
{include file="{ROOT}/views/include/footer.php"}

</body>

<script>
    if (parseInt($('#cart-count').text()) === 0) {
        $('#cart-count').hide();
    }
</script>
