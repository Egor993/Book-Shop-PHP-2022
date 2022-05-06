
<!-- Heeader -->
{include file="{ROOT}/views/include/header.tpl"}


<div class="container">
    <h2>Регистрация</h2>
        <form action="/register/" method="post">
			{if !$result}
	            <p><label for="id_username">Логин:</label>
	            <input type="text" name="username" class="form-control" autofocus value={$name}>
	            <span class="helptext">• Введите уникальное имя пользователя</span></p>

	            <p><label for="id_email">E-mail:</label> 
	            <input type="email" name="email" class="form-control" value={$email}></p>

	            <p><label for="id_password1">Пароль:</label>
	            <input type="password" name="password1" class="form-control"> 
	            <span class="helptext">• Пароль должен быть минимум из 6 символов</span></p>

				{if $errors}
					<ul class="alert alert-danger">
						{foreach $errors as $error}
							<li>{$error}</li>
						{/foreach}
					</ul>
				{/if}

	            <p><label for="id_password2">Подтверждение пароля:</label>
	            <input type="password" name="password2" class="form-control"></p>

	            <button type="submit" name="submit" class ="btn btn-primary btn-block">Отправить</button>
	        </form>
			{else}
				<br>
				<div class="p-3 mb-2 bg-success text-white">Вы успешно зарегестрировались!</div>
				<br>
			{/if}
</div>

</body>
</html>

