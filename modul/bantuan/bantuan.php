<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	$aksi = "modul/bantuan/aksi_bantuan.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$krt = pg_query($koneksi, "SELECT * FROM bantuan");
			$count = pg_num_rows($krt);
			echo "

	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA BANTUAN KELUARGA</h2>";
?>
			<form method="post" name="frm">

				<div style="text-align:right">

					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>

					<a class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=bantuan&act=tambahbantuan"><i class="fa fa-send"></i> Tambah</a>

					<?php
					if ($count > 0) {
					?>
						<button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_bantuan();"><i class="fa fa-desktop"></i> Lihat</button>
						<button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_bantuan();"><i class="fa fa-edit"></i> Edit</button>
						<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onClick="delete_records_bantuan();"><i class="fa fa-remove"></i> Hapus </button>
				</div>

			<?php } ?>


			<div class='box-body'>
				<div class="box-body table-responsive no-padding">
					<table id='example28' class='table table-bordered table-striped'>
						<thead>
							<tr>
								<th>
									<input type="checkbox" name="select_all" id="select_all" value="" />
								</th>
								<th>No</th>
								<th>Tgl.Entry</th>
								<th>No.KK</th>
								<th>Nama</th>
								<th>Dasawisma</th>
								<th>Lingkungan</th>
								<th>Kelurahan/Desa</th>
								<th>Kecamatan</th>
								<th>DTKS</th>
								<th>Non-DTKS</th>
								<th>PBNT</th>
								<th>JPS-Provinsi</th>
								<th>BLT-DD</th>
								<th>PKH</th>
								<th>BST</th>
								<th>PMKS</th>
								<th>PBI</th>
								<th>Lainnya</th>
							</tr>
						</thead>


					</table>
				</div>
			</form>
			</div>
			</div>
		<?php
			break;
		case "tambahbantuan":
		?>
			<center>
				<h3 class="box-title">Data Bantuan Keluarga</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=bantuan&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

						<div class="form-group">
								<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang"; ?>">
								</div>
							</div>
							<!-- <div class="form-group">
								<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="hidden"  id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK" maxlength="16" minlength="16">
									<p id="demo"></p>
								</div>
							</div> -->
							<div class="form-group">
								<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="nik" id="nik" placeholder="NIK"  maxlength="16" minlength="16" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal19"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
						<!-- <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK"> -->
						<input type="text" class="validate[required,custom[number]] form-control" name="nokk" id="nokk" placeholder="No.KK" maxlength="16" minlength="16" readonly>
					 </div>
					 </div>

					<div class="form-group">
						<label for="nama" class="col-sm-4 control-label">Nama<span class="text-danger"> *</span></label>
						<div class="col-sm-7">
							<input type="text" class="validate[required] form-control" id="nama" name="nama" placeholder="Nama" readonly>
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
									<input type="text" class="form-control" name="lingkungan" id="lingkungan" placeholder="Lingkungan" readonly>
								</div>
							</div>
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


						</div><!-- /.box-body -->
					</div>

					<div class="col-md-6">
                  <div class="box-body">

					 <div class="form-group">
                     <label for="jenis_bantuan" class="col-sm-6 control-label">Jenis Bantuan</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" value="DTKS" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Non-DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" value="Non-DTKS" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBNT</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" value="PBNT" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">JPS-Provinsi</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" value="JPS-Provinsi" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BLT-DD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" value="BLT-DD" class="chk-box">
                       </div>
					 </div>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PKH</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" value="PKH" class="chk-box">
                       </div>
					 </div>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BST</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek7" value="BST" class="chk-box">
                       </div>
					 </div>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PMKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek8" value="PMKS" class="chk-box">
                       </div>
					 </div>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBI</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek9" value="PBI" class="chk-box">
                       </div>
					 </div>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Lainnya</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek10" value="Lainnya" class="chk-box">
                       </div>
					 </div>


		</div>
		</div>

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
												<th>Kelurahan/Desa</th>
												<th>Kode Kec</th>
												<th>Kecamatan</th>
												<th>Lingkungan</th>

											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' order by lingkungan desc");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih19" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-kecamatan="<?php echo $data['kecamatan']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">

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

					<div class="modal fade" id="myModal19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" style="width:800px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel2">Data Warga</h4>
								</div>
								<div class="modal-body">
									<table id="example4" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NIK</th>
												<th>No.KK</th>
												<th>Nama</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM datawarga where kodekel='$_SESSION[ses_kodekel]' order by nokk");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih20" data-id="<?php echo $data['id']; ?>" data-nokk="<?php echo $data['nokk']; ?>" data-nik="<?php echo $data['nik']; ?>" data-nama="<?php echo $data['nama']; ?>">

													<td><?php echo $data['nik']; ?></td>
													<td><?php echo $data['nokk']; ?></td>
													<td><?php echo $data['nama']; ?></td>
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
							<a type="submit" href="appmaster.php?module=bantuan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>
			</div>


<?php


	}
}
?>