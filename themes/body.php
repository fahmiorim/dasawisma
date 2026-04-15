<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
  include "../config/library.php";
?>

  <!-- Content Header (Page header) -->
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
  <script>
    var refreshId = setInterval(function() {
      $('#totkeluargakec').load('themes/totkeluargakec.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totwargakec').load('themes/totwargakec.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totkrtkec').load('themes/totkrtkec.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totdasawismakec').load('themes/totdasawismakec.php');
    }, 1000);
  </script>

  <script>
    var refreshId = setInterval(function() {
      $('#totdasawisma').load('themes/totdasawisma.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totkecamatan').load('themes/totkecamatan.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totkelurahan').load('themes/totkelurahan.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totkrt').load('themes/totkrt.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totwarga').load('themes/totwarga.php');
    }, 1000);
  </script>
  <script>
    var refreshId = setInterval(function() {
      $('#totkeluarga').load('themes/totkeluarga.php');
    }, 1000);
  </script>


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">

                <h3 id="totkecamatan"></h3>

                <p>Data Kecamatan</p>
              </div>
              <div class="icon">
                <i class="fa fa-university"></i>
              </div>
              <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
                <a href="appmaster.php?module=kecamatan" class="small-box-footer">Selengkapnyaa <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3 id="totkelurahan"></h3>

                <p>Data Kelurahan</p>
              </div>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
                <a href="appmaster.php?module=kelurahan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                  <h3 id="totdasawismakec"></h3>
                <?php } ?>
                <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                  <h3 id="totdasawisma"></h3>
                <?php } ?>
                <p>Data Dasawisma</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
                <a href="appmaster.php?module=dasawisma2" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                  <h3 id="totkrtkec"></h3>
                <?php } ?>
                <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                  <h3 id="totkrt"></h3>
                <?php } ?>
                <p>Data Kepala Rumah Tangga</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
                <a href="appmaster.php?module=datakrt2" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>

          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary col-centered">
                  <div class="inner">
                    <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                      <h3 id="totwargakec"></h3>
                    <?php } ?>
                    <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                      <h3 id="totwarga"></h3>
                    <?php } ?>

                    <p>Data Warga</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
                    <a href="appmaster.php?module=datawarga2" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  <?php } ?>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                  <div class="inner">
                    <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                      <h3 id="totkeluargakec"></h3>
                    <?php } ?>
                    <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                      <h3 id="totkeluarga"></h3>
                    <?php } ?>

                    <p>Data Keluarga</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk') { ?>
                    <a href="appmaster.php?module=keluarga2" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  <?php } ?>
                </div>
              </div>

              <!-- ./col -->
            </div>
            <!-- ./col -->
        </div>

    </div><!-- /.row -->
    <div class="col-xs-12">
      <div class="box box-blue">
        <div class="box-header with-border"><i class="fa fa-bullhorn"></i><b>Pengumuman</b>
        </div>
        <blockquote class="blockquote text-justify">
          <p>Mohon untuk seluruh operator jika masih ada kesalahan data pada inputan atau ada yang kurang lengkap penginputan NIK sebelum pembaruan ini,
            mohon untuk segera diperbaiki, agar data yang terinput di Aplikasi e-dasawisma valid dan bisa menjadi dasar untuk singronisasi data. Mohon untuk kerjasama nya. Terima kasih.
          </p>
          <!-- <p>1. Aplikasi sedang ada pembaharuan yang signifikan, kami sedang menambahkan beberapa fitur baru untuk memudahkan pekerjaan anda, jika ada menu yang error / 404, anda
            tidak perlu kwatir, kami akan segera menyelesaikannya, anda tetap melakukan penginputan data seperti biasa dengan baik dan benar.</p>
          <P>2. Akan ada perubahan terhadap penginputan <b>Data warga</b> & <b>Data Keluarga</b>, anda tidak perlu kwatir tentang masalah ini, jika perubahan sudah selesai, anda hanya tinggal menggunakan fitur Edit pada data tersebut.</P>
           <p>3. Mohon penginputan data dipercepat dan segera diselesaikan sesuai dengan aturan yang berlaku.</p>
          <p>4. Pada menu <b>Data Warga</b> ada penambahan inputan <b>Penerima Bantuan</b> & <b>Jenis Bantuan</b>,
            <b>Mohon di input</b>, dan jika
            data sebelumnya belum di input, anda tidak perlu kwatir, anda hanya tinggal mengedit data sebelumnya.
          </p>
          <p>4. Untuk bisa mendapatkan <b>Rekapitulasi Data Ibu Hamil, Melahirkan, Nifas (Lampiran III - 18a)</b>, silahkan Edit kembali Data Warga, dan pilih KRT yang sama itu kembali, sebenarnya
          tidak ada perubahan, hanya saja untuk mengambil <b>Kode Dasawisma</b> yang pada versi aplikasi sebelumnya tidak ada menyimpan <b>Kode Dasawisma</b>, ini dimaksudkan agar bisa mengambil <b>Rekapitulasi Data (Lampiran III 18a) Per-Dasawisma.</b><br>
          Berikut Caranya :<br>
          1. Pilih Data Warga.<br>
          2. Pilih KRT yang mau di Edit.<br>
          3. Lalu tekan tombol Cari, pilih saja Nama KRT yang tadi di pilih <i>(pada opsi 2)</i>.<br>
          4. Lalu tekan tombol Edit.<br>
          </p> -->
          <footer class="blockquote-footer">Admin</footer>
        </blockquote>
      </div>
    </div>

  </section><!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">



  </section><!-- /.content -->




<?php
}
?>