<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập</title>

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
      <a href=""><b>ĐĂNG NHẬP</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng Nhập Để Bất Đầu</p>
        <form id="myForm" action="<?php echo ROOT_URL . '?url=HomeController/LoginUser' ?>" method="post">
          <div class="input-group mb-3">
            <input id="email" name="email" type="" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->

            <div class="col-4">
              <button type="submit" name="submitLogin" value="đăng nhập" class="btn btn-primary btn-block">Đăng
                Nhập</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

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

        <p class="mb-1">
          <a href="<?php echo ROOT_URL . '?url=HomeController/register' ?>">Đăng Ký</a>

        </p>
        <div>
          <?php $data['mes'] ?? "" ?>
        </div>
        <a href="<?php echo ROOT_URL . '?url=HomeController/forgotPass' ?>">Quên Mật Khẩu?</a>
      </div>

      <!-- /.login-card-body -->
    </div>
    <div class="mt-3">
      <?php
      if (isset($_SESSION['showError'])) {
        echo $_SESSION['showError'];
        unset($_SESSION['showError']);
      } ?>
    </div>
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