<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {


  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch ($act) {
    default:
      $sipkunjungan = pg_query($koneksi, "select * from sipkunjungan where tahun='$_SESSION[thnaktif]' order by nobln");
      $count = pg_num_rows($sipkunjungan);
      echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN JUMLAH PENGUNJUNG/PETUGAS POSYANDU/ JUMLAH BAYI LAHIR/MENINGGAL</h2>";
?>
      <form method="post" name="frm">

        <div style="text-align:right">



          <?php
          if ($count > 0) {
          ?>


            <div class="form-group">
              <div class="form-group">

                <div class="col-sm-2">
                  <input type="hidden" id="id" class="form-control" />
                  <input type="text" class="validate[required,custom[number]] form-control" name="idposyandu" id="idposyandu" placeholder="ID.Posyandu" readonly>
                </div><button type="button" class="col-sm-1 btn btn-info" data-toggle="modal" data-target="#myModal17"><i class="fa fa-search"></i> Cari</button>
              </div>

              <div class="form-group">
                <label for="posyandu" class="col-sm-1 control-label">Posyandu</label>
                <div class="col-sm-2">
                  <input type="text" class="validate[required] form-control" name="posyandu" id="namaposyandu" placeholder="Nama Posyandu" readonly>
                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-2">
                  <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" readonly>
                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-2">
                  <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" readonly>
                </div>
              </div>

              <div class="col-sm-2">
                <input type="text" class="form-control" id="thnkunjungan" name="thnkunjungan" placeholder="yyyy" value="<?php echo "$_SESSION[thnaktif]"; ?>">
              </div>
            </div>


            <a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

            <button class="btn bg-blue btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Tahunan" onClick="print_records_rptsipkunjungankotathn();"><i class="fa fa-print"></i>Tahunan</button>

        </div>

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
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Nama Posyandu</th>
                <th>Dasawisma</th>
                <th>Lingkungan</th>
                <th>Desa/Kelurahan</th>
                <th>Kecamatan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              $tim = pg_query($koneksi, "select * from sipkunjungan where tahun='$_SESSION[thnaktif]' order by tahun desc,nobln ");
              while ($tm = pg_fetch_array($tim)) {
              ?>
                <tr>
                  <td style='text-align:center'>

                    <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tm['id']; ?>" />
                  </td>
                  <td><?php echo " $no"; ?></td>
                  <td><?php echo " $tm[bulan]"; ?></td>
                  <td><?php echo " $tm[tahun]"; ?></td>
                  <td><?php echo " $tm[namaposyandu]"; ?></td>
                  <td><?php echo " $tm[dasawisma]"; ?></td>
                  <td><?php echo " $tm[lingkungan]"; ?></td>
                  <td><?php echo " $tm[kelurahan]"; ?></td>
                  <td><?php echo " $tm[kecamatan]"; ?></td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>

          </table>
        </div>
      </form>
      </div>
      </div>

      <div class="modal fade" id="myModal17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Data Posyandu</h4>
            </div>
            <div class="modal-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID.Posyandu</th>
                    <th>Nama Posyandu</th>
                    <th>Desa/Kelurahan</th>
                    <th>Kecamatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $qu = pg_query($koneksi, "SELECT * FROM posyandu order by id desc");
                  while ($data = pg_fetch_array($qu)) {
                  ?>
                    <tr class="pilih17" data-id="<?php echo $data['id']; ?>" data-idposyandu="<?php echo $data['idposyandu']; ?>" data-namaposyandu="<?php echo $data['namaposyandu']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>" data-kecamatan="<?php echo $data['kecamatan']; ?>">

                      <td><?php echo $data['idposyandu']; ?></td>
                      <td><?php echo $data['namaposyandu']; ?></td>
                      <td><?php echo $data['kelurahan']; ?></td>
                      <td><?php echo $data['kecamatan']; ?></td>
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