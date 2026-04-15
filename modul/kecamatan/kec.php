<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	$aksi = "modul/kecamatan/aksi_kec.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$kec = pg_query($koneksi, "SELECT * FROM kecamatan");
			$count = pg_num_rows($kec);
			echo "


                <div class='box-header'>
                  <h2 class='box-title'>DATA KECAMATAN KABUPATEN BATU BARA</h2>";
?>
			<form method="post" name="frm">

				<div style="text-align:right">
					<a class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=kecamatan&act=tambahkec"><i class="fa fa-send"></i> Tambah</a>

					<?php
					if ($count > 0) {
					?>
						<button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_kec();"><i class="fa fa-edit"></i> Edit</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onClick="delete_records_kec();"><i class="fa fa-remove"></i> Hapus </button>
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
								<th>Kode</th>
								<th>Kecamatan</th>
								<th>Alamat</th>
								<th>Nama Camat</th>
								<th>No.HP</th>
								<th>Jlh KK</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$kec = pg_query($koneksi, "select * from kecamatan order by kode");
							while ($kc = pg_fetch_array($kec)) {
							?>
								<tr>
									<td style='text-align:center'>

										<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $kc['id']; ?>" />
									</td>
									<td><?php echo " $no"; ?></td>
									<td><?php echo " $kc[kode]"; ?></td>
									<td><?php echo " $kc[nama_kec]"; ?></td>
									<td><?php echo " $kc[alamat]"; ?></td>
									<td><?php echo " $kc[nama_camat]"; ?></td>
									<td><?php echo " $kc[nohp]"; ?></td>
									<td><?php echo " $kc[jlh_kk]"; ?></td>
								</tr>
							<?php
								$no++;
							}
							?>
						</tbody>

					</table>
				</div>
			</div>
			</div>
			</div>
		<?php
			break;
		case "tambahkec":
		?>
			<center>
				<h3 class="box-title">Data Kecamatan Kabupaten Batu Bara</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=kecamatan&act=input" method="POST">
					<div class="col-md-6">
						<div class="box-body">
							<div class="form-group">
								<label for="kode_kec" class="col-sm-4 control-label">Kode</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="kode_kec" placeholder="Kode" required>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_kec" placeholder="Kecamatan" required>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat" class="col-sm-4 control-label">Alamat Kantor</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="alamat" placeholder="Alamat Kantor" required>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_camat" class="col-sm-4 control-label">Nama Camat</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_camat" placeholder="Nama Camat" required>
								</div>
							</div>

							<div class="form-group">
								<label for="nohp" class="col-sm-4 control-label">No.HP</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nohp" placeholder="No.HP">
								</div>
							</div>
							<div class="form-group">
								<label for="jlh_kk" class="col-sm-4 control-label">Jumlah KRT</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="jlh_kk" placeholder="Jumlah KRT">
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<div class=" col-md-12">
						<div class="box-footer">
							<a type="submit" href="appmaster.php?module=kecamatan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>



<?php


	}
}
?>