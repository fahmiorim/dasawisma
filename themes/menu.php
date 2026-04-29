<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../index.php');
} else {
?>
  <aside class="main-sidebar" style="background: linear-gradient(180deg, #008080 0%, #007373 100%);">

    <section class="sidebar">

      <ul class="sidebar-menu" style="background: transparent;">
        <li class="header text-center" style="color: rgba(255,255,255,0.7); background: rgba(0,0,0,0.1);">Menu</li>
        <li><a href="?module=beranda" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-home"></i> <span> Beranda</span></a></li>

        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') { ?>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-bar-chart"></i>
              <span>Grafik</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=grapkec" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Grafik Data Kecamatan</a></li>
              <li><a href="?module=graphbantuan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> <span>Grafik Bantuan Kecamatan</span></a></li>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') { ?>
                <li><a href="?module=grapdesa" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Grafik Data Kelurahan/Desa</a></li>
              <?php } ?>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') { ?>
                <li><a href="?module=graphbantuan1" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> <span>Grafik Bantuan Kelurahan/Desa</span></a></li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-database"></i>
              <span>Master Data</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=hakakses" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Hak Akses</a></li>
              <li><a href="?module=tahunaktif" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Tahun Aktif</a></li>
              <li><a href="?module=akseptorkb" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Jenis Akseptor KB</a></li>
              <li><a href="?module=kriteria" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Kriteria Kader</a></li>
              <li><a href="?module=satuan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Satuan Industri</a></li>
              <li><a href="?module=kategori" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Kategori Pekarangan</a></li>
              <li><a href="?module=pekerjaan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Pekerjaan</a></li>
              <li><a href="?module=pendidikan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Pendidikan</a></li>
              <li><a href="?module=mstkeluarga" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Status Keluarga</a></li>
              <li><a href="?module=mstanggota" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Status Anggota</a></li>
              <li><a href="?module=mstjabatan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Jabatan Dalam PKK</a></li>
              <li><a href="?module=mstkomoditi" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Jenis Komoditi</a></li>
              <li><a href="?module=mstpekarangan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Pemanfaatan Pekarangan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-map-marker"></i>
              <span>Wilayah Administrasi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=kecamatan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
              <li><a href="?module=kelurahan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Kelurahan</a></li>
              <li><a href="?module=dasawisma" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Dasawisma</a></li>
              <li><a href="?module=lingkungan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Lingkungan</a></li>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
          <li><a href="?module=dasawisma" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-home"></i> Data Dasawisma</a></li>
          <li><a href="?module=datakrt" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-users"></i> Kepala Rumah Tangga</a></li>
          <li><a href="?module=datawarga" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-user"></i> Data Warga</a></li>
          <li><a href="?module=keluarga" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-users"></i> Data Keluarga</a></li>
          <li><a href="?module=bantuan" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-gift"></i>Data Bantuan <span class="badge" style="background: #e74c3c;">new</span></a></li>


          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-child"></i>
              <span>Data Ibu dan Bayi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=kehamilan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Rekap Catatan Kehamilan</a></li>
              <li><a href="?module=ibubayi" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Ibu/Balita/Bayi</a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-building"></i>
              <span>Data Aset</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=tamanbaca" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
              <li><a href="?module=koperasi" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Koperasi</a></li>
              <li><a href="?module=bangunan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Bangunan</a></li>
              <li><a href="?module=mobiler" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Mobiler</a></li>
              <li><a href="?module=mesin" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>
              <li><a href="?module=pelatihan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Pelatihan Kader</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-heartbeat"></i>
              <span>Posyandu</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=posyandu" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Profil Posyandu</a></li>
              <li>
                <a href="#" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data SIP
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="background: rgba(0,0,0,0.2);">
                  <li><a href="?module=sipkunjungan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <li><a href="?module=sipkegiatan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>
                </ul>
              </li>
            </ul>
          </li>


        <?php } ?>


        <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
          <li><a href="?module=datakrt" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-users"></i> Kepala Rumah Tangga</a></li>
          <li><a href="?module=datawarga" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-user"></i> Data Warga</a></li>
          <li><a href="?module=keluarga" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-users"></i> Data Keluarga</a></li>


          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-child"></i>
              <span>Data Ibu dan Bayi</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=kehamilan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Rekap Catatan Kehamilan</a></li>
              <li><a href="?module=ibubayi" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data Ibu/Balita/Bayi</a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-building"></i>
              <span>Data Aset</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=tamanbaca" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Taman Bacaan</a></li>
              <li><a href="?module=koperasi" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Koperasi</a></li>
              <li><a href="?module=bangunan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Bangunan</a></li>
              <li><a href="?module=mobiler" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Mobiler</a></li>
              <li><a href="?module=mesin" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Mesin/Elektronik</a></li>

            </ul>
          </li>
          <li><a href="?module=pelatihan" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);"><i class="fa fa-graduation-cap"></i> Pelatihan Kader</a></li>

          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-heartbeat"></i>
              <span>Posyandu</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=posyandu" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Profil Posyandu</a></li>
              <li>
                <a href="#" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Data SIP
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="background: rgba(0,0,0,0.2);">
                  <li><a href="?module=sipkunjungan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i>Pengunjung/Petugas/Bayi</a></li>
                  <li><a href="?module=sipkegiatan" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i>Hasil Kegiatan Posyandu</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-print"></i> <span>Print Laporan</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li>
                <a href="#" style="color: rgba(255,255,255,0.9);"><i class="fa fa-share"></i> Rekapitulasi Ibu/Bayi/Balita
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="background: rgba(0,0,0,0.2);">
                  <li><a href="?module=rekap18a" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rekap18ads" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>
                </ul>
              </li>
            </ul>
          </li>

        <?php } ?>



        <?php if ($_SESSION['ses_level'] == 'admin') { ?>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-users-cog"></i>
              <span>User System</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=user" style="color: rgba(255,255,255,0.9);"><i class="fa fa-user"></i>Manajemen User</a></li>

            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-print"></i> <span>Print Laporan</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li>
                <a href="#" style="color: rgba(255,255,255,0.9);"><i class="fa fa-share"></i> Rekapitulasi Ibu/Bayi/Balita
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="background: rgba(0,0,0,0.2);">
                  <li><a href="?module=rekap18a" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Per Kelurahan</a></li>
                  <li><a href="?module=rekap18ads" style="color: rgba(255,255,255,0.9);"><i class="fa fa-circle-o"></i> Per Dasawisma</a></li>
                </ul>
              </li>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['ses_level'] == 'admpkk') { ?>
          <li class="treeview">
            <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
              <i class="fa fa-users-cog"></i>
              <span>User System</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
              <li><a href="?module=user" style="color: rgba(255,255,255,0.9);"><i class="fa fa-user"></i>Manajemen User</a></li>
            </ul>
          </li>
        <?php } ?>

        <li class="treeview">
          <a href="#" style="color: white; border-left: 3px solid rgba(255,255,255,0.3);">
            <i class="fa fa-user-circle"></i>
            <span>Akun Saya</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" style="background: rgba(0,0,0,0.1);">
            <li><a href="?module=resetpassword" style="color: rgba(255,255,255,0.9);"><i class="fa fa-key"></i> <span> Ubah Password</span></a></li>
          </ul>
        </li>

      </ul>
    </section>
  </aside>
<?php
}
?>