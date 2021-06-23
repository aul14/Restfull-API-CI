<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body class="bg-dark">


  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <?= $this->session->flashdata('notifLogin'); ?>
      <div class="card-body">
        <form action="" method="post">
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">Email</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
              </div>
              <input type="text" class="form-control" name="useremail" id="inputText" placeholder="Email" required="required" autofocus="autofocus">
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="form-label-group">
              <input  type="text" id="inputText" name="username" class="form-control" placeholder="text" required="required" autofocus="autofocus">
            <label for="inputname">Username</label>
            </div>
          </div> -->
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">Password</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
              </div>
              <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required="required">
            </div>
          </div>

          <!-- <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div> -->
          <div class="row mt-3">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary mb-2" name="login">
                <i class="fas fa-chevron-circle-left"></i>
                Login
                &nbsp;<i class="fas fa-chevron-circle-right"></i></button>

            </div>
          </div>
        </form>
        <!-- <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>