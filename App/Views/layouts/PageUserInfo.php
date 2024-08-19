<div class="content-wrapper">
    <div class="content-header">

<?php if(isset($_SESSION['user'])):?>
<div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>thông tin tài khoản</span>
                                        <a class="edit-link" data-toggle="modal"
                                           href="#edit_personal_details"><i
                                                    class="fa fa-edit mr-1"></i>cập nhật</a>
                                    </h5>
                                    <div class="row mt-5">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Họ tên</p>
                                        <p class="col-sm-9"><?=$data['user_name']?></p>
                                    </div>
                                    <div class="row ">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số điện thoại</p>
                                        <p class="col-sm-9"><?=$data['user_phone']?></p>
                                    </div>
                                    
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Địa chỉ</p>
                                        <p class="col-sm-9"><?= $data['user_address']?></p>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true"
                                 role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cập nhật thông tin tài khoảng</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=ROOT_URL.'?url=UserController/userInfo'?>" method="post" >
                                                <div class="row form-row">
                                                    
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Họ và tên</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?= $data['user_name'] ?>" name="user_name">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Số điện thoại</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?=$data['user_phone'] ?>" name="user_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?=$data['user_address'] ?>" name="user_address">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                             
                                                <button type="submit" class="btn btn-primary btn-block"
                                                        name="btn_edit_info">Lưu thông tin
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <!-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">Cập nhật mật khẩu mới</h3>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">

                                            <form method="post">
                                                <div class="form-group">
                                                    <label>Mật khẩu cũ</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_old"
                                                               name="pass_old">
                                                        <span toggle="#pass_old"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_name_old)) {
                                                            echo $error_name_old;
                                                        }
                                                        if (isset($error_name_old_not)) {
                                                            echo $error_name_old_not;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Mật khẩu mới</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_new"
                                                               name="pass_new">
                                                        <span toggle="#pass_new"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_pass_new)) {
                                                            echo $error_pass_new;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu mới</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_confirm"
                                                               name="pass_confirm">
                                                        <span toggle="#pass_confirm"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_pass_confirm)) {
                                                            echo $error_pass_confirm;
                                                        }
                                                        if (isset($error_new_not_confirm)) {
                                                            echo $error_new_not_confirm;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?= $id ?>" name="id_user">
                                                <button class="btn btn-primary" type="submit" name="btn_edit_pass">cập
                                                    nhật
                                                </button>
                                                <div id="pass_error" class="error-message"
                                                     style="color: chartreuse; font-size: 14px; margin-top: 5px;">
                                                    <?php
                                                    if (isset($success)) {
                                                        echo $success;
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
      
                        </div> -->
</div>
<?php
    if (isset($_SESSION['showError'])) {
      echo $_SESSION['showError'];
      unset($_SESSION['showError']);
    } ?>
  </div>
</div>