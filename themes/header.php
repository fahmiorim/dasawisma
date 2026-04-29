<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
?>

  <?php
  include "../config/library.php";
  include "../config/koneksi.php";
  ?>


  <header class="main-header" style="background: linear-gradient(135deg, #008080 0%, #007373 100%); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <a href="?module=beranda" class="logo" style="background: rgba(255,255,255,0.1); color: white;">
      <span class="logo-mini" style="color: white;"><b>e</b>DAS</span>
      <span class="logo-lg" style="color: white;"><img src="assets/images/logopkk.png" style="height: 30px; margin-right: 10px;" alt="PKK Logo" /><b>e-Dasawisma <?php echo "$_SESSION[thnaktif]"; ?></b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation" style="background: transparent;">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color: white;">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;">
              <?php
              include "../config/koneksi.php";
              $use = pg_query($koneksi, "select * from users where username='$_SESSION[ses_user]' ");
              $us = pg_fetch_array($use);
              $foto = $us['foto'];
              if ($foto == '') {
              ?>
                <img src="assets/images/logopkk.png" class="user-image" alt="User Image" style="border: 2px solid rgba(255,255,255,0.3);" />
              <?php
              } else {
              ?>
                <img src="assets/img/foto_user/<?php echo $_SESSION['ses_foto']; ?>" class="user-image" style="border: 2px solid rgba(255,255,255,0.3);" />
              <?php
              }
              ?>
              <span class="hidden-xs"><?php echo $_SESSION['ses_nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background: linear-gradient(135deg, #008080 0%, #007373 100%); color: white; padding: 20px;">
                <?php if ($foto == '') {
                ?>
                  <img src="assets/images/logopkk.png" class="img-circle" alt="User Image" style="width: 90px; height: 90px; border: 4px solid rgba(255,255,255,0.3); margin-bottom: 10px;" />

                <?php
                } else {
                ?>
                  <img src="assets/img/foto_user/<?php echo $_SESSION['ses_foto']; ?>" class="img-circle" style="width: 90px; height: 90px; border: 4px solid rgba(255,255,255,0.3); margin-bottom: 10px;" />
                <?php
                }
                ?>

                <p style="font-size: 18px; margin: 10px 0 5px;">
                  <?php echo $_SESSION['ses_nama']; ?>
                </p>
                <p style="font-size: 13px; opacity: 0.9; margin: 0;">
                  <?php echo ucfirst($_SESSION['ses_level']); ?>
                  <?php
                  if ($_SESSION['ses_level'] == 'admkec') {
                    echo "<br><small>Kec. " . $_SESSION['ses_namakec'] . "</small>";
                  } elseif ($_SESSION['ses_level'] == 'admkel') {
                    echo "<br><small>Kel. " . $_SESSION['ses_namakel'] . "</small>";
                  }
                  ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body" style="padding: 15px;">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="?module=resetpassword" style="text-decoration: none; color: #333;">
                      <div style="background: #f5f5f5; border-radius: 8px; padding: 15px; transition: all 0.3s;">
                        <i class="fa fa-key" style="font-size: 24px; color: #008080;"></i>
                        <p style="margin: 10px 0 0; font-size: 12px; font-weight: 500;">Ubah Password</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="?module=beranda" style="text-decoration: none; color: #333;">
                      <div style="background: #f5f5f5; border-radius: 8px; padding: 15px; transition: all 0.3s;">
                        <i class="fa fa-home" style="font-size: 24px; color: #008080;"></i>
                        <p style="margin: 10px 0 0; font-size: 12px; font-weight: 500;">Beranda</p>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" style="padding: 15px; background: #f9f9f9;">
                <div class="pull-left">
                  <span style="font-size: 12px; color: #666;">
                    <i class="fa fa-clock-o"></i> Login: <?php echo date('H:i'); ?>
                  </span>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat" style="background: #e74c3c; border: none; border-radius: 20px; padding: 5px 20px;">
                    <i class="fa fa-sign-out"></i> Keluar
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<?php
}
?>