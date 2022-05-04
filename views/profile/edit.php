<?php include ROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" href="/template/css/profile.css" type="text/css" media="all">

<div class="container emp-profile">
            <form form enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/template/images/profile/<?php echo $image_name ?>" alt=""/>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $data['name']; ?>
                                    </h5>
                                    <br>
                                    <h6>
                                        (User)
                                    </h6>
                                    <p class="proile-rating">Покупок : <span>0</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="/profile" role="tab" aria-controls="home" aria-selected="false">Информация</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="true">Настройки</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p><input type="file" name="image"/></p>
                            <?php if (isset($img_error)): ?>
                                <ul class="alert alert-danger">
                                    <li><?php echo $img_error;?></li>
                                </ul>
                            <?php endif;?>
                            <button type="sumbit" class="btn btn-success btn-block follow" autofocus>Обновить фотографию</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                    	<form action="#" method="post">

						<p><label for="id_password1">Старый пароль:</label> 
						<input type="password" name="password0" class="form-control" autofocus> 

						<p><label for="id_password1">Пароль:</label> 
						<input type="password" name="password1" class="form-control"> 
						<span class="helptext">• Пароль должен быть минимум из 6 символов</span></p>

						
						<?php if (isset($errors) and is_array($errors)): ?>
							<ul class="alert alert-danger">
								<?php foreach ($errors as $error): ?>
									<li><?php echo $error;?></li>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
						

						<p><label for="id_password2">Подтверждение пароля</label> 
						<input type="password" name="password2" class="form-control"></p>

						<?php if ($result): ?>
							<div class="p-3 mb-2 bg-success text-white"><?php echo 'Вы успешно сменили пароль' ?></div>
						<?php endif; ?>

						<button type="submit", name="submit", class ="btn btn-primary btn-block", value='Registration'>Отправить</button>
					</form>
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
