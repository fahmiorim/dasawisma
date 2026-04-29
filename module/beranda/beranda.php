<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
  include "../config/library.php";
  include "../config/koneksi.php";

  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $totkecamatan = pg_query($koneksi, "SELECT COUNT(*) as total FROM kecamatan");
    $totkecamatan = pg_fetch_result($totkecamatan, 0, 'total');

    $totkelurahan = pg_query($koneksi, "SELECT COUNT(*) as total FROM kelurahan");
    $totkelurahan = pg_fetch_result($totkelurahan, 0, 'total');

    $totdasawisma = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma");
    $totdasawisma = pg_fetch_result($totdasawisma, 0, 'total');

    $totkrt = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt");
    $totkrt = pg_fetch_result($totkrt, 0, 'total');

    $totwarga = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga");
    $totwarga = pg_fetch_result($totwarga, 0, 'total');

    $totkeluarga = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga");
    $totkeluarga = pg_fetch_result($totkeluarga, 0, 'total');
  } elseif ($_SESSION['ses_level'] == 'admkec') {
    $totkelurahan = pg_query($koneksi, "SELECT COUNT(*) as total FROM kelurahan WHERE kodekec='$_SESSION[ses_kodekec]'");
    $totkelurahan = pg_fetch_result($totkelurahan, 0, 'total');

    $totdasawismakec = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE kodekec='$_SESSION[ses_kodekec]'");
    $totdasawismakec = pg_fetch_result($totdasawismakec, 0, 'total');

    $totkrtkec = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt WHERE kodekec='$_SESSION[ses_kodekec]'");
    $totkrtkec = pg_fetch_result($totkrtkec, 0, 'total');

    $totwargakec = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga WHERE kodekec='$_SESSION[ses_kodekec]'");
    $totwargakec = pg_fetch_result($totwargakec, 0, 'total');

    $totkeluargakec = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga WHERE kodekec='$_SESSION[ses_kodekec]'");
    $totkeluargakec = pg_fetch_result($totkeluargakec, 0, 'total');
  } elseif ($_SESSION['ses_level'] == 'admkel') {
    $totdasawisma = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE kodekel='$_SESSION[ses_kodekel]'");
    $totdasawisma = pg_fetch_result($totdasawisma, 0, 'total');

    $totkrt = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt WHERE kodekel='$_SESSION[ses_kodekel]'");
    $totkrt = pg_fetch_result($totkrt, 0, 'total');

    $totwarga = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga WHERE kodekel='$_SESSION[ses_kodekel]'");
    $totwarga = pg_fetch_result($totwarga, 0, 'total');

    $totkeluarga = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga WHERE kodekel='$_SESSION[ses_kodekel]'");
    $totkeluarga = pg_fetch_result($totkeluarga, 0, 'total');
  }
?>

  <section class="content-header">
    <h1>
      Dashboard
      <small>Data Real Time e-Dasawisma</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo isset($totkecamatan) ? number_format($totkecamatan, 0, ',', '.') : 0; ?></h3>
              <p>Data Kecamatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
              <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnyaa <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

      <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') { ?>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo isset($totkelurahan) ? number_format($totkelurahan, 0, ',', '.') : 0; ?></h3>

              <p>Data Kelurahan</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
              <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
              <h3><?php echo isset($totdasawismakec) ? number_format($totdasawismakec, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
              <h3><?php echo isset($totdasawisma) ? number_format($totdasawisma, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <p>Data Dasawisma</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
            <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
              <h3><?php echo isset($totkrtkec) ? number_format($totkrtkec, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
              <h3><?php echo isset($totkrt) ? number_format($totkrt, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <p>Data Kepala Rumah Tangga</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
            <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-primary col-centered">
          <div class="inner">
            <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
              <h3><?php echo isset($totwargakec) ? number_format($totwargakec, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
              <h3><?php echo isset($totwarga) ? number_format($totwarga, 0, ',', '.') : 0; ?></h3>
            <?php } ?>

            <p>Data Warga</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
            <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
              <h3><?php echo isset($totkeluargakec) ? number_format($totkeluargakec, 0, ',', '.') : 0; ?></h3>
            <?php } ?>
            <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
              <h3><?php echo isset($totkeluarga) ? number_format($totkeluarga, 0, ',', '.') : 0; ?></h3>
            <?php } ?>

            <p>Data Keluarga</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
            <a href="appmaster.php?module=beranda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="box box-blue">
        <div class="box-header with-border"><i class="fa fa-bullhorn"></i><b>Pengumuman</b>
        </div>
        <blockquote class="blockquote text-justify">
          <p>Mohon untuk seluruh operator jika masih ada kesalahan data pada inputan atau ada yang kurang lengkap penginputan NIK sebelum pembaruan ini,
            mohon untuk segera diperbaiki, agar data yang terinput di Aplikasi e-dasawisma valid dan bisa menjadi dasar untuk singronisasi data. Mohon untuk kerjasama nya. Terima kasih.
          </p>
          <footer class="blockquote-footer">Admin</footer>
        </blockquote>
      </div>
    </div>
  </section>

<?php
}
?>