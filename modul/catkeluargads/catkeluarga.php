<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {


  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch ($act) {
    default:
      $datawarga = pg_query($koneksi, "select * from datawarga");
      $count = pg_num_rows($datawarga);
      echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN CATATAN KELUARGA PER-DASAWISMA</h2>";
?>
      <form method="post" name="frm">

        <?php
        if ($count > 0) {
        ?>
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
        <div class='box-body'>

          <div class="box-body table-responsive no-padding">

            <!--<table id='example1' class='table table-bordered table-striped'>


                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="select_all" id="select_all" value="" />
                    </th>
                    <th>No</th>
                    <th>No KRT</th>
                    <th>Nama KRT</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Dasawisma</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;

                  $tim = pg_query($koneksi, "select * from datakrt where kode='$datakode' and kodekel='$_SESSION[ses_kodekel]' order by id ");

                  while ($tm = pg_fetch_array($tim)) {
                  ?>
                    <tr>
                      <td style='text-align:center'>

                        <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tm['id']; ?>" />
                      </td>
                      <td><?php echo " $no"; ?></td>

                      <td><?php echo " $tm[nokrt]"; ?></td>
                      <td><?php echo " $tm[namakrt]"; ?></td>
                      <td><?php echo " $tm[kelurahan]"; ?></td>
                      <td><?php echo " $tm[kecamatan]"; ?></td>
                      <td><?php echo " $tm[dasawisma]"; ?></td>

                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>



              </table>-->
          </div>
      </form>
      </div>
      </div>

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

                  $qu = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' order by id desc");
                  while ($data = pg_fetch_array($qu)) {
                  ?>
                    <tr class="pilih18" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-nama_ketua="<?php echo $data['keterangan']; ?>">


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

<?php

  }
}
?>