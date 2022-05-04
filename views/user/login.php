
<!-- Heeader -->
<?php include ROOT.'/views/include/header.php'; ?>


<div class="container">
    <h2>Вход на сайт</h2>
        <form action="#" method="post">
            
            <p><label for="id_username">Username:</label> 
            <input type="text" name="username" class="form-control" autofocus value=''> 
            <span class="helptext">• Введите уникальное имя пользователя</span></p>

<!--             <p><label for="id_email">E-mail:</label> 
            <input type="email" name="email" class="form-control" value=''></p> -->

            <p><label for="id_password1">Password:</label> 
            <input type="password" name="password" class="form-control"> 
            <span class="helptext">• Пароль должен быть минимум из 6 символов</span></p>

            
            <?php if (isset($errors) and is_array($errors)): ?>
            <ul class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error;?></li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
          
            <button type="submit", name="submit", class ="btn btn-primary btn-block", value='Enter'>Отправить</button>
        </form>
</div>


</body>
</html>

