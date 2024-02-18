<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quên Mật Khẩu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/public/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Quên Mật Khẩu</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng Nhập Để Bất Đầu</p>
        <form id="" action="" method="post">
          <div class="input-group mb-3">
            <input id="" name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">php
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            <button type="submit" name="forgotPwd" class="btn btn-primary btn-block">Lấy Lại Mật kHẩu</button>
              
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- <form id="" action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="forgotPwd" class="btn btn-primary">Gửi</button>

                            </div>
                        </form> -->

        <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>Đăng Nhập Bằng FaceBook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Đăng Nhập Bằng Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->

      

      <!-- /.login-card-body -->
    </div>
    
  </div>
  <div class="mt-3">
      <?php
      if (isset($_SESSION['showError'])) {
        echo $_SESSION['showError'];
        unset($_SESSION['showError']);
      } ?>
    </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <!-- jQuery -->


  <script src="/public/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/public/assets/dist/js/adminlte.min.js"></script>
</body>

</html>