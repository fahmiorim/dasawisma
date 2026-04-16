<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../../../404.php');
} else {
  $aksi = "module/kecamatan/aksi_kec.php";
  $act = isset($_GET['act']) ? $_GET['act'] : '';


  switch ($_GET['act']) {
      // Tampil List View
    default:
      if(!isset($_GET['id']) || $_GET['id'] == "") {
?>
        <script>
          alert('Data tidak ditemukan');
          window.location.href = 'appmaster.php?module=kecamatan';
        </script>
      <?php
      }
      $id = $_GET['id'];

      ?>
      <center>
        <h3 class="box-title">Edit Data Kecamatan Kabupaten Batu Bara</h3>
      </center>

      <div class="box box-info">

        <div class="box-header with-border">

        </div><!-- /.box-header -->

        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=kecamatan&act=update&id=<?php echo $id; ?>">
          <?php
            $res = pg_query($koneksi, "select * from kecamatan where id=" . $id);
            $r = pg_fetch_array($res);
          ?>
            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label for="kode_kec" class="col-sm-4 control-label">Kode</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="kode_kec" value="<?php echo $r['kode']; ?>" placeholder="Kode" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama_kec" value="<?php echo $r['nama_kec']; ?>" placeholder="Kecamatan" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat" class="col-sm-4 control-label">Alamat Kantor</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $r['alamat']; ?>" placeholder="Alamat Kantor" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_camat" class="col-sm-4 control-label">Nama Camat</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama_camat" value="<?php echo $r['nama_camat']; ?>" placeholder="Nama Camat" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nohp" class="col-sm-4 control-label">No.HP Camat</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nohp" value="<?php echo $r['nohp']; ?>" placeholder="No.HP Camat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jlhkrt" class="col-sm-4 control-label">Jumlah KRT</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="jlh_kk" value="<?php echo $r['jlh_kk']; ?>" placeholder="Jumlah KRT">
                  </div>
                </div>

              </div><!-- /.box-body -->
            </div>


          <div class="form-group">

            <div class="col-sm-offset-2 col-sm-5">
              <button class="btn bg-purple btn-flat margin" title="Edit"><i class="fa fa-pencil"></i>
                Edit
              </button>

              <a class="btn btn-danger" title="Hapus" onclick="self.history.back()"><i class="fa fa-remove"></i>
                Batal
              </a>
            </div>
          </div>


        </form>
      </div>

<?php
		break;
  }
}
?>