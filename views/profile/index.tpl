{include file="{ROOT}/views/include/header.tpl"}
<link rel="stylesheet" href="/template/css/profile.css" type="text/css" media="all">

<div class="container emp-profile">
            <form form enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/template/images/profile/{$user->image}" alt=""/>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {$user->name}
                                    </h5>
                                    <br>
                                    <h6>
                                        (User)
                                    </h6>
                                    <p class="proile-rating">Покупок : <span>0</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" href="#">Информация</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" href="#">Настройки</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2"><a href="/exit"><input type="button" class="profile-edit-btn" value="ВЫХОД"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p><input type="file" name="image"/></p>
                            {if $imgErrors}
                                <ul class="alert alert-danger">
                                    {foreach $imgErrors as $error}
                                        <li>{$error}</li>
                                    {/foreach}

                                </ul>
                            {/if}
                            <button type="sumbit" class="btn btn-success btn-block follow" autofocus>Обновить фотографию</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="profile-data" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{$user->id}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{$user->name}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{$user->email}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="settings" style="display: none;">
                            <form action="#" method="post">

                                <p><label for="id_password1">Старый пароль:</label>
                                    <input type="password" name="oldPassword" class="form-control" autofocus>

                                <p><label for="id_password1">Новый пароль:</label>
                                    <input type="password" name="password1" class="form-control">
                                    <span class="helptext">• Пароль должен быть минимум из 6 символов</span></p>

                                {if $passErrors}
                                    <ul class="alert alert-danger">
                                        {foreach $passErrors as $error}
                                            <li>{$error}</li>
                                        {/foreach}
                                    </ul>
                                {/if}

                                <p><label for="id_password2">Подтверждение нового пароля</label>
                                    <input type="password" name="password2" class="form-control"></p>

                                {if $isPassChanged}
                                    <div class="p-3 mb-2 bg-success text-white">Вы успешно сменили пароль</div>
                                {/if}

                                <button type="submit" name="submit" class ="btn btn-primary btn-block" value='Registration'>Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</html>

<script>
    $('#profile-tab').click(function (e) {
        e.preventDefault()
        $('#myTabContent').hide();
        $('.settings').show();
        $('#home-tab').removeClass('active');
        $('#profile-tab').addClass('active');
    })

    $('#home-tab').click(function (e) {
        e.preventDefault()
        $('.settings').hide();
        $('#myTabContent').show();
        $('#profile-tab').removeClass('active');
        $('#home-tab').addClass('active');
    })

</script>