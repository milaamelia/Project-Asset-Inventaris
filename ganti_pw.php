<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ibazaar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href=""><b>Ibazaar</b>ابازاار</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Change Of Password</p>

      <form name="myform" action="" onsubmit="return validateForm()" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="passwordlama" class="form-control" placeholder="New Passoword">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="passwordbaru" class="form-control" placeholder="Old Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" name="simpan" class="btn btn-info btn-block btn-flat" value="Ganti">Save</button>
            <button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
            <button type="button" class="btn btn-warning btn-block btn-flat" onclick="javascript:history.back()"><span></span> Back</button>
          </div>
        </div>
        <!-- /.col -->
    </div>
    </form>
  </div>
  <!-- /.form-box -->
  </div>
  <!-- /.proses-->

  <!-->
<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) { //simpan baran
  $username = $_POST['username'];
  $passwordlama = $_POST['passwordlama'];
  $passwordbaru = $_POST['passwordbaru'];
  $cekuser = "select * from login where username = '$username' and password ='$passwordlama'";
  $querycekuser = mysqli_query($conn, $cekuser);
  $count = mysqli_num_rows($querycekuser);
  if ($count >= 1) {
    $updatepassword = "update login set password = '$passwordbaru' where username ='$username'";
    $updatequery = mysqli_query($conn, $updatepassword);
    if ($updatequery) {
      echo "<script>alert('Password Berhasil diganti')</script>";

      "Password telah diganti menjadi $passwordbaru";
    }
  }
}


?>


<!-- jQuery 3 -->
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script src="asset/js/jquery.min.js"></script>
  <script src="jquery.validationEngine-en.js" type="ext/javascript" charset="utf-8"></script>
  <script src="jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="validationEngine.jquery.css" type="text/css" />ja
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script>
    jQuery(document).ready(function() {
      jQuery(“#formID”).validationEngine();
    });
  </script>
  <script>
    function validateForm() {
      var x = document.forms["myForm"]["username"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
  </script>
</body>

</html>