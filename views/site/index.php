
<!-- Heeader -->
<?php include ROOT.'/views/include/header.php'; ?>

        </div>
        <!--//main-content-->
        <!---->
        <ol class="breadcrumb editContent">
            <li class="breadcrumb-item">
                <a href="/">Главная</a>
            </li>
        </ol>
        <!---->
        <!-- banner -->
        <section class="ab-info-main py-md-5 py-4 editContent" style="padding-left: 3rem; padding-right: 3rem;">
            <div class="container-fluid py-md-3">
                <div class="row">
                    <div class="side-bar col-lg-3">

                        <div class="search-bar w3layouts-newsletter">
                            <h3 class="sear-head editContent">Поиск книги</h3>
                            <form action="#" method="post" class="d-flex editContent" >
                                <input type="search" placeholder="Введите название..." name="search" class="form-control" required="">
                                <button class="btn1 btn" ><span class="fa fa-search" aria-hidden="true" ></span></button>
                            </form>
                        </div>
                        <!--preference -->
                            <form action="#" method="post">
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
                        <form action="#" method="post">
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

                    </div>
                    <!-- //product left -->
                    <!-- product right -->
                    <div class="left-ads-display col-lg-9">
                        <div class="row">
                            <?php foreach ($latestProducts as $product): ?>
                            <div class="col-md-3">
                                <div class="product-shoe-info editContent text-center mt-lg-4" >
                                    <div class="men-thumb-item">
                                        <a href="product/<?php echo $product['id'];?>" class="editContent" >
                                        <img src="/template/images/<?php echo $product['image'];?>"  class="img-fluid-main">
                                    </div>
                                    <div class="item-info-product">
                                        <h4>
                                            <?php echo $product['name'];?></a>
                                        </h4>
                                        <h6>
                                            <?php echo $product['price'];?> руб
                                        </h6>            
                                            <a href="#" class="buybtn" data-id='<?php echo $product['id']; ?>'>
                                                <span class="buybtn-text">
                                                    Купить
                                                </span>
                                                <span class="buybtn-image">
                                                    <span></span>
                                                </span>
                                            </a>
                                        <div class="product_price">
                                            <div class="grid-price">
                                                <span class="money editContent" >«Слогана нет»</span>
                                            </div>
                                        </div>
                                        <ul class="stars">
                                            <li><a href="#"><span class="<?php if ($product['rating_amount']/$product['rating_count'] > 0.5) echo 'fa fa-star'; else if ($product['rating_amount']/$product['rating_count'] == 0.5) echo 'fa fa-star-half-o'; else echo 'fa fa-star-o';?>" aria-hidden="true" ></span></a></li>
                                            <li><a href="#"><span class="<?php if ($product['rating_amount']/$product['rating_count'] >= 2) echo 'fa fa-star'; else if ($product['rating_amount']/$product['rating_count'] == 1.5) echo 'fa fa-star-half-o'; else echo 'fa fa-star-o';?>" aria-hidden="true" ></span></a></li>
                                            <li><a href="#"><span class="<?php if ($product['rating_amount']/$product['rating_count'] >= 3) echo 'fa fa-star'; else if ($product['rating_amount']/$product['rating_count'] == 2.5) echo 'fa fa-star-half-o'; else echo 'fa fa-star-o';?>" aria-hidden="true" ></span></a></li>
                                            <li><a href="#"><span class="<?php if ($product['rating_amount']/$product['rating_count'] >= 4) echo 'fa fa-star'; else if ($product['rating_amount']/$product['rating_count'] == 3.5) echo 'fa fa-star-half-o'; else echo 'fa fa-star-o';?>" aria-hidden="true" ></span></a></li>
                                            <li><a href="#"><span class="<?php if ($product['rating_amount']/$product['rating_count'] >= 5) echo 'fa fa-star'; else if ($product['rating_amount']/$product['rating_count'] == 4.5) echo 'fa fa-star-half-o'; else echo 'fa fa-star-o';?>" aria-hidden="true" ></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                    </div>

                </div>

            </div>

            
                    <nav aria-label="Page navigation example">
                    <?php echo $pagination->get(); ?>
                    </nav>

        </section>


<!-- Footer -->
<?php include ROOT.'/views/include/footer.php'; ?>

</body>
</html>
