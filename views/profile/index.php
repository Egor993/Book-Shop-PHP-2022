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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Информация</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="profile/edit" role="tab" aria-controls="profile" aria-selected="false">Настройки</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2"><a href="/exit"><input type="button" class="profile-edit-btn"value="ВЫХОД"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p><input type="file" name="image"/></p>
                            <?php if (isset($img_error)): ?>
                                <ul class="alert alert-danger">
                                    <li><?php echo $img_error; ?></li>
                                </ul>
                            <?php endif;?>
                            <button type="sumbit" class="btn btn-success btn-block follow" autofocus>Обновить фотографию</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $data['id']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $data['name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $data['email']; ?></p>
                                            </div>
                                        </div>
                                      
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<!-- 

<body>
    <div class="container main-secction">
        <div class="row">
                <br>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="template/images/profile/3qAAAgO4ieA-1920.jpg" class="rounded-circle">
                        </div>
                        <br><br><br><br><br><br><br><br><br><br>
                        <form enctype="multipart/form-data" method="post">

						<div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
						    
						<div class="input-wrapper">
						  <input type="file" name="image" preview-target-id="preview_1">
						</div>
						<br>
                            <button type="sumbit
                            " class="btn btn-success btn-block follow" autofocus>Обновить фотографию</button> 
                                   <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <p></p>
                            </div>                                 
                        </div>
                    	</form>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <p>Покупок</p>
                                <span>0</span>
                            </div>                           
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1><?php echo $data['name']; ?></h1>
                                    <br>
                                    <h5>Developer</h5>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <a href="/search" class="btn btn-primary btn-block">Личные сообщения</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> About</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="profile/edit" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Edit</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
<!--                                               <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                        <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>ID</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $data['id']; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $data['email']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                

                                                </div>
                                            </div>
                                        </div>                                                
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>                   -->        

                                

<!-- 

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Contactarme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Nombre completo</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Teléfono</label>
                        <input type="text" id="txtPhone" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body> -->
 -->