<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
?>

  <?php

  include "../config/library.php";
  ?>
  <header class="main-header">
    <a href="?module=beranda" class="logo">
      <span class="logo-mini"><b>e</b>DAS</span>
      <span class="logo-lg"><b>e-Dasawisma <?php echo "$_SESSION[thnaktif]"; ?></b></span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- tambahan untuk notifikasi pesan -->


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              include "../config/koneksi.php";
              $use = pg_query($koneksi, "select * from users where username='$_SESSION[ses_user]' ");
              $us = pg_fetch_array($use);
              $foto = $us['foto'];
              if ($foto == '') {
              ?>
                <img src="images/logopkk.png" class="user-image" alt="User Image" />
              <?php
              } else {
              ?>
                <img src="img/foto_user/<?php echo $_SESSION['ses_foto']; ?>" class="user-image" />
              <?php
              }
              ?>
              <span class="hidden-xs"><?php echo $_SESSION['ses_nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if ($foto == '') {
                ?>
                  <img src="images/logopkk.png" class="user-image" alt="User Image" />

                <?php
                } else {
                ?>
                  <img src="img/foto_user/<?php echo $_SESSION['ses_foto']; ?>" class="img-circle" />
                <?php
                }
                ?>


                <p>
                  <?php echo $_SESSION['ses_nama']; ?> - <?php echo $_SESSION['ses_level']; ?>

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
<?php
}
?>