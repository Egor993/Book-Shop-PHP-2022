
{include file="{ROOT}/views/include/header.tpl"}

<div class="action-notification" style="display: none">
   <div id="check-mark"></div> Товар успешно добавлен в корзину
</div>

<ol class="breadcrumb editContent">
    <li class="breadcrumb-item">
        <a href="/">Главная</a>
    </li>
</ol>

<section class="ab-info-main py-md-5 py-4 editContent" style="padding-left: 3rem; padding-right: 3rem;">
    <div class="container-fluid py-md-3">
        <div class="row">
            <div class="side-bar col-lg-3">

                <div class="search-bar w3layouts-newsletter">
                    <h3 class="sear-head editContent">Поиск книги</h3>
                    <form action="#" method="get" class="d-flex editContent" >
                        <input type="search" placeholder="Введите название..." name="search" class="form-control" required="">
                        <button class="btn1 btn" ><span class="fa fa-search" aria-hidden="true" ></span></button>
                    </form>
                </div>

                    <div class="left-side my-4">
                        <h3 class="sear-head editContent">Жанры</h3>
                        <ul class="w3layouts-box-list">
                            {foreach $genres as $genre}
                                <li class="editContent">
                                    <input type="checkbox" class="genre" id={$genre->id} {if in_array($genre->id, $selectedGenresArr)} checked="checked"{/if}>
                                    {$genre->name}
                                </li>
                            {/foreach}
                        </ul>
                    </div>

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
            </div>

            <div class="left-ads-display col-lg-9">
                <div class="row">
                    {foreach $products as $product}
                        <div class="col-md-3">
                            <div class="product-shoe-info editContent text-center mt-lg-4" >
                                <div class="men-thumb-item">
                                    <a href="product?id={$product->id}" class="editContent" >
                                    <img src="/template/images/{$product->image}"  class="img-fluid-main">
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="product?id={$product->id}">{$product->name}</a>
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
                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money editContent" >«Слогана нет»</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">
                {foreach $totalPages as $page}
                    <li class="page-item">
                        <a class="page-link" href="/?page={$page}&genres={$selectedGenres}&search={$search}">
                            {$page}
                        </a>
                    </li>
                {/foreach}
            </ul>
        </nav>
    </div>
</section>

{include file="{ROOT}/views/include/footer.tpl"}
