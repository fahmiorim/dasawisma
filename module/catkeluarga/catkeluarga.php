<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {

  $act = isset($_GET['act']) ? $_GET['act'] : '';
  $scope_filter = isset($_GET['scope']) ? $_GET['scope'] : 'kk';

  switch ($act) {
    default:
      $datawarga = pg_query($koneksi, "select * from datawarga");
      $count = pg_num_rows($datawarga);
      
      $title = "LAPORAN CATATAN KELUARGA";
      if($scope_filter == 'kk') {
        $title .= " PER-KK";
      } elseif($scope_filter == 'dasawisma') {
        $title .= " PER-DASAWISMA";
      } elseif($scope_filter == 'kecamatan') {
        $namakec = $_SESSION['ses_namakec'];
        $title .= " KECAMATAN $namakec";
      }
      
      echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>$title";
?>
      <form method="post" name="frm">

        <div style="text-align:right">

          <select class="form-control" style="width:150px; display:inline-block; margin-left:10px;" onchange="window.location.href='?module=catkeluarga&scope='+this.value">
            <option value="kk" <?php echo $scope_filter == 'kk' ? 'selected' : ''; ?>>Per KK</option>
            <option value="dasawisma" <?php echo $scope_filter == 'dasawisma' ? 'selected' : ''; ?>>Per Dasawisma</option>
            <?php if($_SESSION['ses_level'] == 'admkec') { ?>
            <option value="kecamatan" <?php echo $scope_filter == 'kecamatan' ? 'selected' : ''; ?>>Per Kecamatan</option>
            <?php } ?>
          </select>

          <?php
          if ($count > 0) {
          ?>

            <?php if($scope_filter == 'kk' || $scope_filter == 'kecamatan') { ?>
            <div class="form-group">
              <label for="nokrt" class="col-sm-1 control-label">No.KRT</label>
              <div class="col-sm-2">
                <input type="hidden" id="id" class="form-control" />
                <input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" placeholder="No.KRT" readonly>
              </div><button type="button" class="col-sm-1 btn btn-info" data-toggle="modal" data-target="#myModal15"><i class="fa fa-search"></i> Cari</button>
            </div>

            <div class="form-group">
              <label for="namakrt" class="col-sm-1 control-label">Nama KRT</label>
              <div class="col-sm-3">
                <input type="text" class="validate[required] form-control" name="namakrt" id="namakrt" placeholder="Nama KRT" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
              <div class="col-sm-3">
                <input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" readonly>
              </div>
            </div>
            <?php } ?>

            <?php if($scope_filter == 'dasawisma') { ?>
            <div class="form-group">
              <label for="kode" class="col-sm-1 control-label">Kode</label>
              <div class="col-sm-2">
                <input type="hidden" id="id" class="form-control" />
                <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="Kode" readonly>
              </div><button type="button" class="col-sm-1 btn btn-info" data-toggle="modal" data-target="#myModal18"><i class="fa fa-search"></i> Cari</button>
            </div>

            <div class="form-group">
              <label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
              <div class="col-sm-3">
                <input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="keterangan" class="col-sm-1 control-label">Nama Ketua</label>
              <div class="col-sm-3">
                <input type="text" class="validate[required] form-control" name="keterangan" id="keterangan" placeholder="Nama Ketua" readonly>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-3">
                <br>
                <button class="btn bg-green" data-toggle="tooltip" data-placement="top" title="Cetak" onClick="print_records_rptcatkeluargads();"><i class="fa fa-eye"></i>Lihat Kelompok</button>
              </div>
            </div>
            <?php } ?>

            <?php if($scope_filter == 'kk' || $scope_filter == 'kecamatan') { ?>
            <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Cetak" onClick="print_records_rptcatkeluargakel();"><i class="fa fa-print"></i>Cetak</button>
            <?php } ?>

          <?php } ?>

          <div class='box-body'>

            <div class="box-body table-responsive no-padding">
              <table id='example1' class='table table-bordered table-striped'>

                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="select_all" id="select_all" value="" />
                    </th>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Status Perkawinan</th>
                    <th>L/P</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl.Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                  </tr>
                </thead>

              </table>
            </div>
      </form>
      </div>
      </div>

      <?php if($scope_filter == 'kk' || $scope_filter == 'kecamatan') { ?>
      <div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Data KRT</h4>
            </div>
            <div class="modal-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.KRT</th>
                    <th>Nama KRT</th>
                    <th>Nama Dasawisma</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($_SESSION['ses_level'] == 'admkec') {
                    $qu = pg_query($koneksi, "SELECT * FROM datakrt where kodekec='$_SESSION[ses_kodekec]' order by id desc");
                  } else {
                    $qu = pg_query($koneksi, "SELECT * FROM datakrt where kodekel='$_SESSION[ses_kodekel]' order by id desc");
                  }
                  while ($data = pg_fetch_array($qu)) {
                  ?>
                    <tr class="pilih15" data-id="<?php echo $data['id']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>" data-namakrt="<?php echo $data['namakrt']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>">

                      <td><?php echo $data['nokrt']; ?></td>
                      <td><?php echo $data['namakrt']; ?></td>
                      <td><?php echo $data['nama_dasawisma']; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if($scope_filter == 'dasawisma') { ?>
      <div class="modal fade" id="myModal18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Data Dasawisma</h4>
            </div>
            <div class="modal-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Dasawisma</th>
                    <th>Nama Ketua</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($_SESSION['ses_level'] == 'admkec') {
                    $qu = pg_query($koneksi, "SELECT * FROM dasawisma where kodekec='$_SESSION[ses_kodekec]' order by id desc");
                  } else {
                    $qu = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' order by id desc");
                  }
                  while ($data = pg_fetch_array($qu)) {
                  ?>
                    <tr class="pilih18" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-keterangan="<?php echo $data['keterangan']; ?>">

                      <td><?php echo $data['kode']; ?></td>
                      <td><?php echo $data['nama_dasawisma']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

<?php

  }
}
?>
