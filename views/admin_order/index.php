<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- END Header -->
<!-- Content -->
<div id="content" class="flex">
    <h1>Выберите заказы для изменения</h1>
    <div class="module" id="changelist">
        <form id="changelist-form" method="post" novalidate><input type="hidden">
            <div class="actions">
                <label>Действие: <select name="action" required>
                        <option value="" selected>---------</option>
                        <option value="delete_selected">Удалить выбранные заказы</option>
                    </select></label><input type="hidden" name="select_across" value="0" class="select-across">
                <button type="submit" class="button" title="Выполнить выбранное действие" name="index"
                    value="0">Выполнить</button>
            </div>
            <input type="button" value="Выделить все" onclick="check();">
            <input type="button" value="Снять выделение" onclick="uncheck();">
            <table id="result_list">
                <thead>
                    <tr>
                        <th scope="col" class="action-checkbox-column">
                            <div class="text"><span></span></div>
                            <div class="clear"></div>
                        </th>
                        <th scope="col" class="column-__str__">
                            <div class="text"><span>Заказы</span></div>
                            <div class="clear"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordersList as $order): ?>
                        <tr class="row1">
                            <td class="action-checkbox">
                                <input type="checkbox" name="_selected_action[]" value="<?php echo $order['id'];?>"
                                    class="action-select">
                            </td>
                            <th class="field-__str__">
                                <a href="/admin/orders/view/<?php echo $order['id'];?>">
                                    Пользователь <?php echo  $order['user_name']; ?> сделал заказ
                                    <?php echo 'ID '.$order['id'];?> (<?php echo $order['date'];?>)
                                </a>
                            </th>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </form>
        </body>
</html>
<?php include ROOT.'/views/include/admin_footer.php'; ?>