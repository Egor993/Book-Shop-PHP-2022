<link rel="stylesheet" href="/template/css/bootstrap.css">
<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- END Header -->
<!-- Content -->
<div id="content" class="colM">
    <h1>Изменить товар</h1>
    <div id="content-main">
        <form enctype="multipart/form-data" method="post">
            <div>
                <fieldset class="module aligned ">
                    <div>
                        <div>
                            <label class="required" for="id_title">Название:</label>
                            <input type="text" name="name" class="vTextField" maxlength="100" required id="id_title"
                                value='<?php echo $product['name'];?>'>
                        </div>
                    </div>
                    <br> <br />
                    <div>
                        <div>
                            <label class="required" for="id_title">Автор:</label>
                            <input type="text" name="author" class="vTextField" maxlength="100" required id="id_title"
                                value='<?php echo $product['author'];?>'>
                        </div>
                    </div>
                    <br> <br />
                    <div class="form-row field-description">
                        <div>
                            <label class="required" for="id_description">Описание:</label>
                            <textarea name="description" cols="60" rows="10" required id="id_description"><?php echo $product['description'];?></textarea>
                        </div>
                    </div>
                    <br> <br />
                    <div class="form-row field-poster">
                        <div class="col-md-3">
                            <img src="/template/images/<?php echo $product['image'];?>" class="img-fluid">
                            <label class="required" for="id_poster">Изображение:</label>
                            <input type="file" name="image" placeholder="">
                        </div>
                    </div>
            </div>
            <div class="form-row field-price">
                <div>
                    <label class="required" for="id_price">Цена:</label>
                    <input type="number" name="price" value='<?php echo $product['price'];?>' class="vIntegerField"
                        required id="id_price">
                </div>
            </div>
            <div class="submit-row">
                <input type="submit" name='submit' value="Сохранить" class="default">
            </div>
            </fieldset>