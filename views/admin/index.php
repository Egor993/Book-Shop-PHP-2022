<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- END Header -->
<!-- Content -->
<div id="content" class="colMS">
    <h1>Администрирование сайта</h1>
    <div id="content-main">
        <div class="app-main module">
            <table>
                <caption>
                    <a href="/admin" class="section" title="Модели в приложении Main">Главная</a>
                </caption>
                <tr class="model-orders">
                    <th scope="row"><a href="/admin/orders/">Заказы</a></th>
                    <td></td>
                    <td><a href="/admin/orders/" class="changelink">Изменить</a></td>
                </tr>
                <tr class="model-reviews">
                    <th scope="row"><a href="/admin/comments">Комментарии</a></th>
                    <td><a href="#" class="addlink"></a></td>
                    <td><a href="/admin/comments" class="changelink">Изменить</a></td>
                </tr>
                <tr class="model-book">
                    <th scope="row"><a href="/admin/products">Товары</a></th>
                    <td><a href="/admin/products/create/" class="addlink">Добавить</a></td>
                    <td><a href="/admin/products" class="changelink">Изменить</a></td>
                </tr>
            </table>
        </div>
        <div class="app-auth module">
            <table>
                <caption>
                    <a href="#" class="section" title="Модели в приложении Пользователи и группы">Пользователи</a>
                </caption>
                <tr class="model-user">
                    <th scope="row"><a href="/admin/users">Пользователи</a></th>
                    <td><a href="/admin/users" class="changelink">Изменить</a></td>
                </tr>
            </table>
        </div>
    </div>
    <br class="clear">
</div>
<!-- END Content -->
<div id="footer"></div>
</div>
<!-- END Container -->
</body>

</html>