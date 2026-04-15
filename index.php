
<?php
$appurl = 'https://dasawisma.batubarakab.go.id/';
//$appurl='http://dasawisma.binjaikota.go.id/';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kabupaten Batu Bara| Log in</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/style2.css">
  <link rel="icon" ; href="<?php $appurl; ?>favicon.png">
</head>
<body style="background:#000000 url(assets/images/bg2.jpg); background-size:cover;" >
  <main class="d-flex align-items-center min-vh-100 py-10 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="assets/images/pkkcover1.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Silahkan Login</p>
              <form action="cek_login.php" method="post" id="popup-validation">

                  <div class="form-group has-feedback">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="username" class="validate[required] form-control" placeholder="Username">
                  </div>

                  <div class="form-group has-feedback">
                <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" class="validate[required] form-control" placeholder="Password">

                    <div class="form-group has-feedback">
					         <select class='validate[required] form-control' name='tahunaktif' id='tahunaktif' placeholder="tahun">
            <?php
              include "config/library.php";
            ?>
              <option><?php echo "$thn_sekarang";?></option>

            <?php
              include "config/koneksi.php";
                  $thn = pg_query($koneksi, "SELECT * FROM tahunaktif order by id");
                    while($p = pg_fetch_array($thn)){

                      echo"
                        <option value=\"$p[thnaktif]\">$p[thnaktif]</option>\n";
                      }
                    echo"";

            ?>
            </select>
                     	</div>

                   <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-key"></i><i class=""></i> Masuk</button>
            </div><!-- /.col -->

                  <!--<button name="submit" class="btn btn-block login-btn mb-4" type="button" value="Login"></button>-->
                </form>
                <nav class="login-card-footer-nav">
                  <a href="#!">Copyrights © 2021 |</a>
                  <a href="#!">e-Dasawisma Kab. Batu Bara</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $(function () { formValidation(); });
    </script>

</body>
</html>
