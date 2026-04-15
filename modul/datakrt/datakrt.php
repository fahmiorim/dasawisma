<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	$aksi = "modul/datakrt/aksi_datakrt.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$krt = pg_query($koneksi, "SELECT * FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != ''");
			$count = pg_num_rows($krt);
			echo "

	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA KEPALA RUMAH TANGGA</h2>";
?>
			<form method="post" name="frm">

				<div style="text-align:right">

					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>

					<a class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=datakrt&act=tambahdatakrt"><i class="fa fa-send"></i> Tambah</a>

					<?php
					if ($count > 0) {
					?>
						<button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_datakrt();"><i class="fa fa-desktop"></i> Lihat</button>
						<button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_datakrt();"><i class="fa fa-edit"></i> Edit</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onClick="delete_records_datakrt();"><i class="fa fa-remove"></i> Hapus </button>
				</div>

			<?php } ?>


			<div class='box-body'>
				<div class="box-body table-responsive no-padding">
					<table id='example21' class='table table-bordered table-striped'>
						<thead>
							<tr>
								<th>
									<input type="checkbox" name="select_all" id="select_all" value="" />
								</th>
								<th>No</th>
								<th>No.KRT</th>
								<th>Nama KRT</th>
								<th>Dasawisma</th>
								<th>Lingkungan</th>
								<th>Kelurahan/Desa</th>
								<th>Kecamatan</th>
							</tr>
						</thead>


					</table>
				</div>
			</form>
			</div>
			</div>
		<?php
			break;
		case "tambahdatakrt":
			$kdkel = $_SESSION[ses_kodekel];
			$rand5 = randpass5(4);
		?>
			<center>
				<h3 class="box-title">Data Kepala Rumah Tangga</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=datakrt&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="validate[required,custom[number]] form-control" value="<?php echo "$kdkel$rand5"; ?>" readonly name="nokrt" placeholder="No.KRT">
								</div>
							</div>

							<div class="form-group">
								<label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="validate[required] form-control" name="namakrt" placeholder="Nama Kepala Rumah Tangga">
								</div>
							</div>


							<div class="form-group">
								<label for="kode" class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal10"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
								<label for="nama_dasawisma" class="col-sm-4 control-label">Nama Dasawisma</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan/Desa</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kelurahan" class="col-sm-4 control-label">Kelurahan/Desa</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" readonly>
								</div>
							</div>



							<div class="form-group">
								<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="lingkungan" class="col-sm-4 control-label">Lingkungan/Dusun</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_lingkungan" id="lingkungan" placeholder="Lingkungan" readonly>
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<!-- <div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="penerima_bantuan" class="col-sm-4 control-label">Penerima Bantuan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<select class="validate[required] form-control" name='penerima_bantuan' id='penerima_bantuan'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis_bantuan" class="col-sm-4 control-label">Jenis Bantuan</label>
								<div class="col-sm-5">
									<select class="form-control" name='jenis_bantuan' id='jenis_bantuan'>
										<option></option>
										<option value="DTKS">DTKS</option>
										<option value="Non-DTKS">Non-DTKS</option>
										<option value="PBNT">PBNT</option>
										<option value="JPS-PROVINSI">JPS-PROVINSI</option>
										<option value="BLT-DD">BLT-DD</option>
										<option value="PKH">PKH</option>
										<option value="BST">BST</option>
										<option value="PMKS">PMKS</option>
										<option value="PBI">PBI</option>
										<option value="Lainnya">Lainnya</option>
									</select>
									<p class="text-danger">* jika tidak menerima bantuan kosongkan saja.</p>
								</div>

							</div>

						</div>
					</div> -->

					<div class="form-group">
						<div class="col-sm-10">
							<label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
						</div>
					</div>

					<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
												<th>Kode Dasawisma</th>
												<th>Nama Dasawisma</th>
												<th>Kode Kel</th>
												<th>Kelurahan</th>
												<th>Kode Kec</th>
												<th>Kecamatan</th>
												<th>Lingkungan</th>

											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != '' order by lingkungan desc");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih10" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-kecamatan="<?php echo $data['kecamatan']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">

													<td><?php echo $data['kode']; ?></td>
													<td><?php echo $data['nama_dasawisma']; ?></td>
													<td><?php echo $data['kodekel']; ?></td>
													<td><?php echo $data['kelurahan']; ?></td>
													<td><?php echo $data['kodekec']; ?></td>
													<td><?php echo $data['kecamatan']; ?></td>
													<td><?php echo $data['lingkungan']; ?></td>
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
							<a type="submit" href="appmaster.php?module=datakrt" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>
			</div>


<?php


	}
}
?>