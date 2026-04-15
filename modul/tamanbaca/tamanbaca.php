<script type="text/javascript">
	$(function() {
		$("#tglentry").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tglentry").change(function() {
			$("#tglentry").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>

<?php
error_reporting(0);
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	$aksi = "modul/tamanbaca/aksi_tamanbaca.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$kec = pg_query($koneksi, "SELECT * FROM tamanbaca");
			$count = pg_num_rows($kec);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA TAMAN BACAAN PKK</h2>";
?>
			<form method="post" name="frm">

				<div style="text-align:right">

					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>

					<a class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=tamanbaca&act=tambahtamanbaca"><i class="fa fa-send"></i> Tambah</a>

					<?php
					if ($count > 0) {
					?>
						<button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_tamanbaca();"><i class="fa fa-desktop"></i> Lihat</button>
						<button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_tamanbaca();"><i class="fa fa-edit"></i> Edit</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onClick="delete_records_tamanbaca();"><i class="fa fa-remove"></i> Hapus </button>
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
								<th>Tgl.Entry</th>
								<th>Nama Taman Baca</th>
								<th>Pengelola</th>
								<th>Status Pengelola</th>
								<th>Jlh Buku</th>
								<th>Dasawisma</th>
								<th>Lingkungan</th>
								<th>Kelurahan</th>
								<th>Kecamatan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$lingk = pg_query($koneksi, "select * from tamanbaca where kodekel='$_SESSION[ses_kodekel]' order by namatamanbaca");
							while ($lk = pg_fetch_array($lingk)) {
							?>
								<tr>
									<td style='text-align:center'>

										<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id']; ?>" />
									</td>
									<td><?php echo " $no"; ?></td>
									<td><?php echo " $lk[tglentry]"; ?></td>
									<td><?php echo " $lk[namatamanbaca]"; ?></td>
									<td><?php echo " $lk[pengelola]"; ?></td>
									<td><?php echo " $lk[stspengelola]"; ?></td>
									<td><?php echo " $lk[jlhbuku]"; ?></td>
									<td><?php echo " $lk[dasawisma]"; ?></td>
									<td><?php echo " $lk[lingkungan]"; ?></td>
									<td><?php echo " $lk[kelurahan]"; ?></td>
									<td><?php echo " $lk[kecamatan]"; ?></td>
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
		<?php
			break;
		case "tambahtamanbaca":

		?>
			<center>
				<h3 class="box-title">TAMBAH DATA TAMAN BACAAN PKK</h3>
			</center>

			<div class="box box-info">
				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=tamanbaca&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang"; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="namatamanbaca" class="col-sm-4 control-label">Nama Taman Bacaan<span class="text-danger"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="validate[required] form-control" name="namatamanbaca" id="namatamanbaca" placeholder="Nama Taman Bacaan">
								</div>
							</div>

							<div class="form-group">
								<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="form-control" name="kodekel" id="kode" placeholder="Kode Kelurahan" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal8"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
								<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namakel" id="nama_kel" placeholder="Nama Kelurahan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="pengelola" class="col-sm-4 control-label">Pengelola<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="pengelola" id="pengelola" placeholder="Pengelola">
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<div class="col-md-6">
						<div class="box-body">
							<div class="form-group">
								<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' readonly>
										<option></option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode");
										while ($p = pg_fetch_array($lk)) {

											echo "
												<option value=\"$p[nama_lingkungan]\">$p[nama_lingkungan]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' readonly>
										<option></option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' order by kode");
										while ($p = pg_fetch_array($lk)) {

											echo "
												<option value=\"$p[nama_dasawisma]\">$p[nama_dasawisma]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="stspengelola" class="col-sm-4 control-label">Status Pengelola<span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class=" validate[required] form-control" name='stspengelola' id='stspengelola'>
										<option>Dikelola PKK</option>
										<option value="Dikelola PKK">Dikelola PKK</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jlhbuku" class="col-sm-4 control-label">Jumlah Buku<span class="text-danger"> *</span></label>
								<div class="col-sm-3">
									<input type="text" class="validate[required,custom[number]] form-control" name="jlhbuku" id="jlhbuku" placeholder="Jumlah Buku">
								</div>
							</div>

							<div class="form-group">
								<label for="userentry" class="col-sm-4 control-label">User Entry</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="userentry" id="userentry" value="<?php echo $_SESSION['ses_nama']; ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="waktuentry" id="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang"; ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="level" class="col-sm-4 control-label">Level User</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="level" id="level" value="<?php echo $_SESSION['ses_level']; ?>" readonly>
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
						</div>
					</div>

					<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:800px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Data Kelurahan</h4>
								</div>
								<div class="modal-body">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Kode Kelurahan</th>
												<th>Kelurahan</th>
												<th>Kode Kecamatan</th>
												<th>Kecamatan</th>

											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM kelurahan where kode='$_SESSION[ses_kodekel]' order by nama_kel");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih8" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_kel="<?php echo $data['nama_kel']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>">

													<td><?php echo $data['kode']; ?></td>
													<td><?php echo $data['nama_kel']; ?></td>
													<td><?php echo $data['kodekec']; ?></td>
													<td><?php echo $data['nama_kec']; ?></td>
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

					<div class="col-md-12">
						<div class="box-footer">
							<a type="submit" href="appmaster.php?module=tamanbaca" name="cmtamanbaca" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>
			</div>


<?php


	}
}
?>