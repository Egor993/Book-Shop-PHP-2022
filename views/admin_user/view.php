<link rel="stylesheet" href="/template/css/bootstrap.css">
<?php include ROOT.'/views/include/admin_header.php'; ?>
<!-- Content -->
<div id="content" class="colM">
    <h1>Просмотр профиля пользователя: <?php echo $user['name']; ?></h1>
    <fieldset class="module aligned ">
        <br />
        <h2>Информация о пользователе</h2>
        <table>
            <tr>
                <td>
                    <h3>ID</h3>
                </td>
                <td>
                    <h3>
                        <h3><?php echo $user['id']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Имя
                </td>
                <td>
                    <h3><?php echo $user['name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>email
                </td>
                <td>
                    <h3><?php echo $user['email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Пароль
                </td>
                <td>
                    <h3><?php echo $user['password']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Роль
                </td>
                <td>
                    <h3><?php echo $user['role']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h3><b>IMG</b>
                </td>
                <td>
                    <h3><img src="/template/images/profile/<?php echo $user['image'] ?>" alt="" />
                </td>
            </tr>
        </table>
        <br> <br />
    </fieldset>
    <a href="/admin/users" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
</div>