<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- END Header -->
<!-- Content -->
<div id="content" class="colM">
    <h1>Добавить товар</h1>
    <div id="content-main">
        <form enctype="multipart/form-data" method="post">
            <div>
                <fieldset class="module aligned ">
                    <div>
                        <div>
                            <label class="required" for="id_title">Название:</label>
                            <input type="text" name="name" class="vTextField" maxlength="100" required id="id_title">
                        </div>
                    </div>
                    <br> <br />
                    <div>
                        <div>
                            <label class="required" for="id_title">Автор:</label>
                            <input type="text" name="author" class="vTextField" maxlength="100" required id="id_title">
                        </div>
                    </div>
                    <div class="form-row field-description">
                        <div>
                            <label class="required" for="id_description">Описание:</label>
                            <textarea name="description" cols="40" rows="10" class="vLargeTextField" required
                                id="id_description"></textarea>
                        </div>
                    </div>
                    <div class="form-row field-poster">
                        <div>
                            <label class="required" for="id_poster">Изображение:</label>
                            <input type="file" name="image" placeholder="" value="">
                        </div>
                    </div>
            </div>
            <div class="form-row field-price">
                <div>
                    <label class="required" for="id_price">Цена:</label>
                    <input type="number" name="price" value="0" class="vIntegerField" min="0" required id="id_price">
                </div>
            </div>
            <div class="submit-row">
                <input type="submit" name='submit' value="Save" class="default">
            </div>
            </fieldset>