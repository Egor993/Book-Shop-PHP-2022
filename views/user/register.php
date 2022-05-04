
<!-- Heeader -->
<?php include ROOT.'/views/include/header.php'; ?>


<div class="container">
    <h2>Регистрация</h2>
        <form action="#" method="post">
            <?php if (!($result)): ?>
	            <p><label for="id_username">Username:</label> 
	            <input type="text" name="username" class="form-control" autofocus value='<?php echo $name; ?>'> 
	            <span class="helptext">• Введите уникальное имя пользователя</span></p>

	            <p><label for="id_email">E-mail:</label> 
	            <input type="email" name="email" class="form-control" value='<?php echo $email; ?>'></p>

	            <p><label for="id_password1">Password:</label> 
	            <input type="password" name="password1" class="form-control"> 
	            <span class="helptext">• Пароль должен быть минимум из 6 символов</span></p>
	            
	            <?php if (isset($errors) and is_array($errors)): ?>
	            <ul class="alert alert-danger">
	                <?php foreach ($errors as $error): ?>
	                    <li><?php echo $error;?></li>
	                <?php endforeach;?>
	            </ul>
	            <?php endif;?>

	            <p><label for="id_password2">Password Confirm:</label> 
	            <input type="password" name="password2" class="form-control"></p>

	            <button type="submit", name="submit", class ="btn btn-primary btn-block", value='Registration'>Отправить</button>
	        </form>
	    <?php else: ?>
	    	<br>
	        <div class="p-3 mb-2 bg-success text-white"><?php echo 'Вы успешно зарегестрировались!' ?></div>
	        <br>
	    <?php endif; ?>
</div>

</body>
</html>

