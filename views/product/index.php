<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Book Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/template/css/bootstrap.css">

    <link rel="stylesheet" href="/template/css/style.css" type="text/css" media="all">

    <link href="/template/css/font-awesome.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
</head>

<body>

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
                            <?php if (!isset($_SESSION['user'])): ?>
                            <li><a href="/register">Регистрация</a></li>
                            <li><a href="/login">Вход</a></li>
                            <?php else: ?>
                            <li><a href="/profile">Профиль</a></li>
                            <?php endif; ?>
                            <li><a href="/cart"><img src="/template/images/full-cart-light.png" height="40" alt=""/></a></li>
                            <span id='cart-count'><?php echo Cart::countItems(); ?></span>
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
                            <form action="/" method="post" class="d-flex editContent" >
                                <input type="search" placeholder="Введите название..." name="search" class="form-control" required="">
                                <button class="btn1 btn" ><span class="fa fa-search" aria-hidden="true" ></span></button>
                            </form>
                        </div>
                        <!--preference -->
                            <form action="/" method="post">
                            <div class="left-side my-4">
                                <h3 class="sear-head editContent">Жанры</h3>
                                <ul class="w3layouts-box-list">       
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Биография'">Биография</button>
                                        </button>
                                    </li>
                                
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Драма'">Драма</button>
                                        </button>
                                    </li>
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Роман'">Роман</button>
                                        </button>
                                    </li>
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Руководство'">Руководство</button>
                                        </button>
                                    </li>
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Фэнтези'">Фэнтези</button>
                                        </button>
                                    </li>
                                    <li class="editContent">
                                            <button type="sumbit" class="btn genre" name="genre[]" value="'Фантастика'">Фантастика</button>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            
                            </form>
                        <!-- // preference -->

                        <!-- reviews -->
                        <form action="/" method="post">
                        <div class="customer-rev left-side my-4">
                            <h3 class="sear-head editContent" >Рейтинг</h3>
                            <ul class="w3layouts-box-list">
                                <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='5' class="btn rating">
                                        
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="editContent" >5</span>
                                    </button>
                                    </a>
                                </li>
                                 <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='4' class="btn rating">
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="editContent" >4</span>
                                    </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='3' class="btn rating">
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="editContent" >3</span>
                                    </button>
                                    <a>
                                </li>
                                <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='2' class="btn rating">
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="editContent" >2</span>
                                    </button>
                                    <a>
                                </li>
                                <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='1' class="btn rating">
                                        <span class="fa fa-star" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true"></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="editContent" >1</span>
                                    </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <button type="sumbit" name ='rating' value ='0' class="btn rating">
                                        <span class="fa fa-star-o" aria-hidden="true"></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="fa fa-star-o" aria-hidden="true" ></span>
                                        <span class="editContent" >0</span>
                                    </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </form>
                        <!-- //reviews -->
                        <!-- deals -->
                        <div class="deal-leftmk left-side">
                            <h3 class="sear-head editContent">Последние добавленные</h3>
                            <?php foreach ($lastAdded as $product): ?>
                            <div class="special-sec1 row mt-3 editContent" >
                                <div class="img-deals col-md-4">
                                    <a href="/product/<?php echo $product['id']; ?>">
                                    <img src="/template/images/<?php echo $product['image'];?>" class="img-fluid" alt="" >
                                </div>
                                <div class="img-deal1 col-md-8">
                                    <h3 class="editContent" ><?php echo $product['name']; ?></h3>
                                    <a href="moviesingle.html" class="editContent" ></a>
                                </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <!-- //deals -->
                    <!-- //deals -->

                </div>
                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <div class="desc1-left col-md-6">
                            <img src="/template/images/<?php echo $viewproduct['image'];?>" class="img-fluid" alt="">
                        </div>
                        <div class="desc1-right col-md-6 pl-lg-4">
                             <div class="item-info-product">
                                <h4>
                                    <?php echo $viewproduct['name'];?></a>
                                </h4>
                                <h6>
                                    <?php echo $viewproduct['price'];?> руб
                                </h6>            
                                <a href="#" class="buybtn" data-id='<?php echo $viewproduct['id']; ?>'>
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
                            <li style="list-style: none"><span><b>Автор:</b> <?php echo $viewproduct['author'];?></span>
                                <li style="list-style: none"><span><b>Жанр:</b> <?php echo $viewproduct['genre'];?></span>
                                </li>
                                <li style="list-style: none">
                                    <b>Рейтинг:</b>
                                    <?php if(!(isset($_SESSION[$id.'i']))): ?>
                                        <form method="post">
        									<div class="rating-area">
        										<input type="radio" id="star-5" name="rating" value="5" onclick="form.submit();">
        										<label for="star-5" title="Оценка «5»"></label>	
        										<input type="radio" id="star-4" name="rating" value="4" onclick="form.submit();">
        										<label for="star-4" title="Оценка «4»"></label>    
        										<input type="radio" id="star-3" name="rating" value="3" onclick="form.submit();">
        										<label for="star-3" title="Оценка «3»"></label>  
        										<input type="radio" id="star-2" name="rating" value="2" onclick="form.submit();">
        										<label for="star-2" title="Оценка «2»"></label>    
        										<input type="radio" id="star-1" name="rating" value="1" onclick="form.submit();">
        										<label for="star-1" title="Оценка «1»"></label>
                                                
                                                <h4><?php echo $rating ?></h4>
        									</div>
                                        </form>
                                    <?php else:?>
                                    <h4><?php echo $rating ?></h4>
                                        <div class="rating-result">
                                            <span class="active"></span>    
                                            <span class="<?php if($_SESSION[$id.'i'] > 1 )echo 'active'; ?>"></span>    
                                            <span class="<?php if($_SESSION[$id.'i'] > 2 )echo 'active'; ?>"></span>  
                                            <span class="<?php if($_SESSION[$id.'i'] > 3 )echo 'active'; ?>"></span>
                                            <span class="<?php if($_SESSION[$id.'i'] > 4 )echo 'active'; ?>"></span>
                                        </div>
                                    <?php endif; ?>
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
                            О книге <?php echo $viewproduct['name'];?></h3>
                        <p class="editContent" style="outline: none; cursor: inherit;">
                        <?php echo $viewproduct['description'];?>
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
   <?php include ROOT.'/views/include/footer.php'; ?>

</body>
