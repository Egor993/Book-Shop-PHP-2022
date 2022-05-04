<link rel="stylesheet" href="/template/css/bootstrap.css">
<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- Content -->
<div id="content" class="colM">
    <h1>Просмотр заказа #<?php echo $order['id']; ?></h1>
    <fieldset class="module aligned ">
        <br />
        <h2>Информация о заказе</h2>
        <table>
            <tr>
                <td>
                    <h3>Номер заказа</h3>
                </td>
                <td>
                    <h3>
                        <h3><?php echo $order['id']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Имя клиента
                </td>
                <td>
                    <h3><?php echo $order['user_name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Телефон клиента
                </td>
                <td>
                    <h3><?php echo $order['user_phone']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Комментарий клиента
                </td>
                <td>
                    <h3><?php echo $order['user_comment']; ?>
                </td>
            </tr>
            <?php if ($order['user_id'] != 0): ?>
            <tr>
                <td>
                    <h3>ID клиента
                </td>
                <td>
                    <h3><?php echo $order['user_id']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <h3><b>Дата заказа</b>
                </td>
                <td>
                    <h3><?php echo $order['date']; ?>
                </td>
            </tr>
        </table>
        <br> <br />
        <h2>Товары в заказе</h2>
        <table class="table-admin-medium table-bordered table-striped table ">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <h3><?php echo $product['id']; ?>
                </td>
                <td>
                    <h3><?php echo $product['name']; ?>
                </td>
                <td>
                    <h3><?php echo $product['price']; ?> руб
                </td>
                <td>
                    <h3><?php echo $productsQuantity[$product['id']]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
    <a href="/admin/orders" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
</div>