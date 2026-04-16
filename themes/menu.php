<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
?>
  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">

          <?php
          include "../config/koneksi.php";
          $use = pg_query($koneksi, "select * from users where username='$_SESSION[ses_user]' ");
          $us = pg_fetch_array($use);
          $foto = $us['foto'];
          if ($foto == '') {
          ?>
            <img src="images/logopkk.png" class="img-circle" />
          <?php } else { ?>
            <img src="img/foto_user/<?php echo $_SESSION['ses_foto']; ?>" class="img-circle" />
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['ses_nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i><?php echo $_SESSION['ses_level']; ?></a>
          <a href="#"><?php echo $_SESSION['ses_kodekec']; ?></a> <a href="#"><?php echo $_SESSION['ses_kodekel']; ?></a>
          <a href="#"><?php echo $_SESSION['ses_namakec']; ?></a>
          <p><i class="fa fa-circle text-success"></i><?php echo $_SESSION['ses_namakel']; ?></p>

        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." />
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">E-Dasawisma Menu</li>
        <li><a href="?module=beranda"><i class="fa fa-home"></i> <span> Beranda</span></a></li>

        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i>
              <span>Grafik</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <!--li><a href="?module=grapinput"><i class="fa fa-circle-o "></i> Grafik Data Input</a></!--li>-->
              <li><a href="?module=grapkec"><i class="fa fa-circle-o "></i> Grafik Data Kecamatan</a></li>
              <li><a href="?module=graphbantuan"><i class="fa fa-circle-o"></i> <span>Grafik Bantuan Kecamatan</span></a></li>
        <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
              <li><a href="?module=grapdesa"><i class="fa fa-circle-o "></i> Grafik Data Kelurahan/Desa</a></li>
              <li><a href="?module=graphbantuan1"><i class="fa fa-circle-o"></i> <span>Grafik Bantuan Kelurahan/Desa</span></a></li>
              <?php } ?>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
              <li><a href="?module=grapdesa2"><i class="fa fa-circle-o "></i> Grafik Data Kelurahan/Desa</a></li>
              <li><a href="?module=graphbantuan2"><i class="fa fa-circle-o"></i> <span>Grafik Bantuan Kelurahan/Desa</span></a></li>

              <?php } ?>
              <!--<li><a href="?module=graprumah"><i class="fa fa-circle-o "></i> Grafik Kriteria Rumah</a></li>-->
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Master Data</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=hakakses"><i class="fa fa-circle-o"></i> Data Hak Akses</a></li>
              <li><a href="?module=tahunaktif"><i class="fa fa-circle-o"></i> Data Tahun Aktif</a></li>
              <li><a href="?module=akseptorkb"><i class="fa fa-circle-o"></i> Jenis Akseptor KB</a></li>
              <li><a href="?module=kriteria"><i class="fa fa-circle-o"></i> Kriteria Kader</a></li>
              <li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan Industri</a></li>
              <li><a href="?module=kategori"><i class="fa fa-circle-o"></i> Kategori Pekarangan</a></li>
              <li><a href="?module=pekerjaan"><i class="fa fa-circle-o"></i> Data Pekerjaan</a></li>
              <li><a href="?module=pendidikan"><i class="fa fa-circle-o"></i> Data Pendidikan</a></li>
              <li><a href="?module=mstkeluarga"><i class="fa fa-circle-o"></i> Status Keluarga</a></li>
              <li><a href="?module=mstanggota"><i class="fa fa-circle-o"></i> Status Anggota</a></li>
              <li><a href="?module=mstjabatan"><i class="fa fa-circle-o"></i> Jabatan Dalam PKK</a></li>
              <li><a href="?module=mstkomoditi"><i class="fa fa-circle-o"></i> Jenis Komoditi</a></li>
              <li><a href="?module=mstpekarangan"><i class="fa fa-circle-o"></i> Pemanfaatan Pekarangan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Wilayah Administrasi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=kecamatan"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
              <li><a href="?module=kelurahan"><i class="fa fa-circle-o"></i> Data Kelurahan</a></li>
              <li><a href="?module=dasawisma"><i class="fa fa-circle-o"></i> Data Dasawisma</a></li>
              <li><a href="?module=lingkungan"><i class="fa fa-circle-o"></i> Data Lingkungan</a></li>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
          <li><a href="?module=dasawisma"><i class="fa fa-files-o"></i> Data Dasawisma</a></li>
          <li><a href="?module=datakrt"><i class="fa fa-files-o"></i> Kepala Rumah Tangga</a></li>
          <li><a href="?module=datawarga"><i class="fa fa-files-o"></i> Data Warga</a></li>
          <li><a href="?module=keluarga"><i class="fa fa-files-o"></i> Data Keluarga</a></li>
          <!-- <li><a href="?module=catkeluarga"><i class="fa fa-files-o"></i> Catatan Keluarga</a></li> -->
          <li><a href="?module=bantuan"><i class="fa fa-files-o"></i>Data Bantuan <span class="badge rounded-pill bg-danger">new</a></li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Ibu dan Bayi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=kehamilan"><i class="fa fa-files-o"></i> Rekap Catatan Kehamilan</a></li>
              <!--<li><a href="?module=bumil"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
              <li><a href="?module=melahirkan"><i class="fa fa-circle-o"></i> Data Ibu Melahirkan</a></li>
              <li><a href="?module=bumilmeninggal"><i class="fa fa-circle-o"></i> Ibu Hamil/Balita Meninggal</a></li>-->
              <li><a href="?module=ibubayi"><i class="fa fa-circle-o"></i> Data Ibu/Balita/Bayi</a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Aset</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

              <!--<li><a href="?module=warung"><i class="fa fa-circle-o"></i> Warung PKK</a></li>-->
              <li><a href="?module=tamanbaca"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
              <li><a href="?module=koperasi"><i class="fa fa-circle-o"></i> Koperasi</a></li>
              <!--<li><a href="?module=binakeluarga"><i class="fa fa-circle-o"></i> Bina Keluarga Balita</a></li>-->
              <li><a href="?module=bangunan"><i class="fa fa-circle-o"></i> Bangunan</a></li>
              <li><a href="?module=mobiler"><i class="fa fa-circle-o"></i> Mobiler</a></li>
              <li><a href="?module=mesin"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>
              <li><a href="?module=pelatihan"><i class="fa fa-files-o"></i> Pelatihan Kader</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Posyandu</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li><a href="?module=posyandu"><i class="fa fa-circle-o"></i> Profil Posyandu</a></li>
              <li>
                <a href="#"><i class="fa fa-circle-o"></i> Data SIP
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=sipkunjungan"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <li><a href="?module=sipkegiatan"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>
                </ul>
              </li>
            </ul>
          </li>



          <li class="treeview">
            <a href="#">
              <i class="fa fa-print"></i> <span>Print Laporan</span>
              <i class="fa fa-angle-left pull-right"></i>
              <!--<span class="pull-right-container">

              </span>-->
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=rptdasawismakel"><i class="fa fa-circle-o"></i> Data Dasawisma</a></li>
              <li><a href="?module=rptdatawargakel"><i class="fa fa-circle-o"></i> Data Warga</a></li>
              <li><a href="?module=rptpelatihankel"><i class="fa fa-circle-o"></i> Pelatihan</a></li>
              <li><a href="?module=rptdatakrtkel"><i class="fa fa-circle-o"></i> Kepala Rumah Tangga</a></li>
              <li>
                <a href="#"><i class="fa fa-share"></i> Rekapitulasi Ibu/Bayi/Balita
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rekap18a"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rekap18ads"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>
                </ul>
              </li>
              <li>
                <a href="#"><i class="fa fa-share"></i> Data Keluarga
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rptkeluargakel"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rptkeluargakelds"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>
                </ul>
              </li>

              <li>
                <a href="#"><i class="fa fa-share"></i> Catatan Keluarga
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=catkeluarga"><i class="fa fa-circle-o"></i> Per Kepala Rumah Tangga</a></li>
                  <li><a href="?module=catkeluargads"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>

                </ul>
              </li>

              <!--<li>
              <a href="#"><i class="fa fa-share"></i> Data Ibu dan Bayi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=rptbumilkel"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
				<li><a href="?module=rptmelahirkankel"><i class="fa fa-circle-o"></i> Data Ibu Melahirkan</a></li>
                <li><a href="?module=rptbumilmeninggalkel"><i class="fa fa-circle-o"></i> Ibu Hamil/Balita Meninggal</a></li>
              </ul>
            </li>-->

              <li>
                <a href="#"><i class="fa fa-share"></i> Data Aset
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <!--<li><a href="?module=rptwarungkel"><i class="fa fa-circle-o"></i> Warung PKK</a></li>-->
                  <li><a href="?module=rpttamanbacakel"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
                  <li><a href="?module=rptkoperasikel"><i class="fa fa-circle-o"></i> Koperasi</a></li>
                  <li><a href="?module=rptbangunankel"><i class="fa fa-circle-o"></i> Bangunan</a></li>
                  <li><a href="?module=rptmobilerkel"><i class="fa fa-circle-o"></i> Mobiler</a></li>
                  <li><a href="?module=rptmesinkel"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>

                </ul>
              </li>

              <li>
                <a href="#"><i class="fa fa-share"></i> SIP Posyandu
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rptposyandukel"><i class="fa fa-circle-o"></i>Profil Posyandu</a></li>
                  <li><a href="?module=rptsipkunjungan"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <!--<li><a href="?module=rptsipkegiatan"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li-->
                </ul>
              </li>

              <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>IVA Test</span>
				<i class="fa fa-angle-left pull-right"></i>
              </a>

			<ul class="treeview-menu">
                <li><a href="?module=rptrekapiva"><i class="fa fa-circle-o"></i> Deteksi Dini Kanker</a></li>
                <li><a href="?module=rptevaluasiiva"><i class="fa fa-circle-o"></i> Evaluasi IVA Test</a></li>
              </ul>
            </li>-->

            </ul>
          </li>
        <?php } ?>


        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
          <li><a href="?module=datakrt2"><i class="fa fa-files-o"></i> Kepala Rumah Tangga</a></li>
          <li><a href="?module=datawarga2"><i class="fa fa-files-o"></i> Data Warga</a></li>
          <li><a href="?module=keluarga2"><i class="fa fa-files-o"></i> Data Keluarga</a></li>
          <!-- <li><a href="?module=bantuan"><i class="fa fa-files-o"></i> Data Bantuan</a></li> -->
          <li><a href="?module=catkeluarga2"><i class="fa fa-files-o"></i> Catatan Keluarga</a></li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Ibu dan Bayi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=kehamilan2"><i class="fa fa-files-o"></i> Rekap Catatan Kehamilan</a></li>
              <!--<li><a href="?module=bumil2"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
              <li><a href="?module=melahirkan2"><i class="fa fa-circle-o"></i> Data Ibu Melahirkan</a></li>
              <li><a href="?module=bumilmeninggal2"><i class="fa fa-circle-o"></i> Ibu Hamil/Balita Meninggal</a></li>-->
              <li><a href="?module=ibubayi2"><i class="fa fa-circle-o"></i> Data Ibu/Balita/Bayi</a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Aset</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

              <!--<li><a href="?module=warung2"><i class="fa fa-circle-o"></i> Warung PKK</a></li>-->
              <li><a href="?module=tamanbaca2"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
              <li><a href="?module=koperasi2"><i class="fa fa-circle-o"></i> Koperasi</a></li>
              <!--<li><a href="?module=binakeluarga2"><i class="fa fa-circle-o"></i> Bina Keluarga Balita</a></li>-->
              <li><a href="?module=bangunan2"><i class="fa fa-circle-o"></i> Bangunan</a></li>
              <li><a href="?module=mobiler2"><i class="fa fa-circle-o"></i> Mobiler</a></li>
              <li><a href="?module=mesin2"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>

            </ul>
          </li>
          <li><a href="?module=pelatihan2"><i class="fa fa-files-o"></i> Pelatihan Kader</a></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Posyandu</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li><a href="?module=posyandu2"><i class="fa fa-circle-o"></i> Profil Posyandu</a></li>
              <li>
                <a href="#"><i class="fa fa-circle-o"></i> Data SIP
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=sipkunjungan2"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <li><a href="?module=sipkegiatan2"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>
                </ul>
              </li>
            </ul>
          </li>



          <li class="treeview">
            <a href="#">
              <i class="fa fa-print"></i> <span>Print Laporan</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=rptdasawismakota"><i class="fa fa-circle-o"></i> Data Dasawisma</a></li>
              <li><a href="?module=rptdatawargakota"><i class="fa fa-circle-o"></i> Data Warga</a></li>
              <li><a href="?module=rptpelatihankota"><i class="fa fa-circle-o"></i> Pelatihan</a></li>

              <li>
                <a href="#"><i class="fa fa-share"></i> Catatan Keluarga
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rptkeluargakota"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rptkeluargakotalingk"><i class="fa fa-circle-o"></i> Per Lingkungan</a></li>
                  <li><a href="?module=rptkeluargakotads"><i class="fa fa-circle-o"></i> Kelompok Dasawisma</a></li>
                  <li><a href="?module=rptkeluargakotakec"><i class="fa fa-circle-o"></i> Per Kecamatan</a></li>

                </ul>
              </li>

              <!--<li>
              <a href="#"><i class="fa fa-share"></i> Data Ibu dan Bayi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=rptbumilkota"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
				<li><a href="?module=rptmelahirkankota"><i class="fa fa-circle-o"></i> Data Ibu Melahirkan</a></li>
                <li><a href="?module=rptbumilmeninggalkota"><i class="fa fa-circle-o"></i> Ibu Hamil/Balita Meninggal</a></li>
              </ul>
            </li>-->

              <li>
                <a href="#"><i class="fa fa-share"></i> Data Aset
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <!--<li><a href="?module=rptwarungkota"><i class="fa fa-circle-o"></i> Warung PKK</a></li>-->
                  <li><a href="?module=rpttamanbacakota"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
                  <li><a href="?module=rptkoperasikota"><i class="fa fa-circle-o"></i> Koperasi</a></li>
                  <!--<li><a href="?module=rptbinakeluargakota"><i class="fa fa-circle-o"></i> Bina Keluarga Balita</a></li>-->
                  <li><a href="?module=rptbangunankota"><i class="fa fa-circle-o"></i> Bangunan</a></li>
                  <li><a href="?module=rptmobilerkota"><i class="fa fa-circle-o"></i> Mobiler</a></li>
                  <li><a href="?module=rptmesinkota"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>

                </ul>
              </li>

              <li>
                <a href="#"><i class="fa fa-share"></i> SIP Posyandu
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rptposyandukota"><i class="fa fa-circle-o"></i>Profil Posyandu</a></li>
                  <li><a href="?module=rptsipkunjungankota"><i class="fa fa-circle-o"></i>SIP Pengunjung</a></li>
                  <li><a href="?module=rptrekapsipkunjungan"><i class="fa fa-circle-o"></i>Rekap SIP Pengunjung</a></li>
                  <!--<li><a href="?module=rptsipkegiatankota"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>-->

                </ul>
              </li>


            </ul>
          </li>


        <?php } ?>



        <?php if ($_SESSION['ses_level'] == 'admin') { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>User System</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=user"><i class="fa fa-user"></i>User Kelurahan</a></li>
              <li><a href="?module=userkec"><i class="fa fa-user"></i>User Kecamatan</a></li>
              <li><a href="?module=useradmin"><i class="fa fa-user"></i>User Administrator</a></li>

            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admkec') { ?>

          <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>IVA Test</span>
				<i class="fa fa-angle-left pull-right"></i>
              </a>

			<ul class="treeview-menu">
                <li><a href="?module=rekapiva"><i class="fa fa-circle-o"></i> Deteksi Dini Kanker</a></li>
                <li><a href="?module=evaluasiiva"><i class="fa fa-circle-o"></i> Evaluasi IVA Test</a></li>
              </ul>
            </li>-->

          <li class="treeview">
            <a href="#">
              <i class="fa fa-print"></i> <span>Print Laporan</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=rptdasawismakec"><i class="fa fa-circle-o"></i> Data Dasawisma</a></li>
              <li><a href="?module=rptdatawargakec"><i class="fa fa-circle-o"></i> Data Warga</a></li>
              <li><a href="?module=rptpelatihankec"><i class="fa fa-circle-o"></i> Pelatihan</a></li>
              <!--<li><a href="?module=keluargakec"><i class="fa fa-files-o"></i> Data Keluarga</a></li>-->
              <li><a href="?module=catkeluargakec"><i class="fa fa-circle-o"></i> Catatan Keluarga</a></li>
              <li>
                <a href="#"><i class="fa fa-share"></i> Data Keluarga
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="?module=rptkeluargakec"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rptkeluargakecds"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>
                </ul>
              </li>



              <!--<li>
              <a href="#"><i class="fa fa-share"></i> Data Ibu dan Bayi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=rptbumilkec"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
				<li><a href="?module=rptmelahirkankec"><i class="fa fa-circle-o"></i> Data Ibu Melahirkan</a></li>
                <li><a href="?module=rptbumilmeninggalkec"><i class="fa fa-circle-o"></i> Ibu Hamil/Balita Meninggal</a></li>
              </ul>
            </li>-->

              <li>
                <a href="#"><i class="fa fa-share"></i> Data Aset
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <!-- <li><a href="?module=rptwarungkec"><i class="fa fa-circle-o"></i> Warung PKK</a></li>-->
                  <li><a href="?module=rpttamanbacakec"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
                  <li><a href="?module=rptkoperasikec"><i class="fa fa-circle-o"></i> Koperasi</a></li>
                  <!--<li><a href="?module=rptbinakeluargakec"><i class="fa fa-circle-o"></i> Bina Keluarga Balita</a></li>-->
                  <li><a href="?module=rptbangunankec"><i class="fa fa-circle-o"></i> Bangunan</a></li>
                  <li><a href="?module=rptmobilerkec"><i class="fa fa-circle-o"></i> Mobiler</a></li>
                  <li><a href="?module=rptmesinkec"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>
                </ul>
              </li>

              <li>
                <a href="#"><i class="fa fa-share"></i> Posyandu
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                  <li><a href="?module=rptsipkunjungankec"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <!-- <li><a href="?module=rptsipkegiatankec"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>-->

                </ul>
              </li>

            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admpkk') { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>User System</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="?module=user"><i class="fa fa-user"></i>User Kelurahan</a></li>
              <li><a href="?module=userkec"><i class="fa fa-user"></i>User Kecamatan</a></li>
            </ul>
          </li>
        <?php } ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Akun Saya</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?module=resetpassword"><i class="fa fa-inbox"></i> <span> Ubah Password</span></a></li>
          </ul>
        </li>

        <!--<li><a href=""><i class="fa fa-book"></i> <span> Tutorial</span></a></li>-->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
}
?>