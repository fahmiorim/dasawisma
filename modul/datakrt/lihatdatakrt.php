<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "modul/datakrt/aksi_datakrt.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (isset($_POST['chk']) == "") {
?>
				<script>
					alert('Opsi Belum Di pilih');
					window.location.href = 'appmaster.php?module=datakrt';
				</script>
			<?php
			}
			$chk = $_POST['chk'];
			$chkcount = count($chk);

			?>
			<center>
				<h3 class="box-title">LIHAT DATA KEPALA RUMAH TANGGA</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->

				<form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=datakrt" id="popup-validation">
					<?php
					for ($i = 0; $i < $chkcount; $i++) {
						$id = $chk[$i];
						$res = pg_query($koneksi, "select * from datakrt where id=" . $id);
						$r = pg_fetch_array($res);
					?>
						<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
						<div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="text" class="validate[required] form-control" name="nokrt" value="<?php echo $r[nokrt]; ?>" placeholder="No.KRT" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
									<div class="col-sm-8">
										<input type="text" class="validate[required] form-control" name="namakrt" value="<?php echo $r[namakrt]; ?>" placeholder="Nama Kepala Rumah Tangga" readonly>
									</div>
								</div>


								<div class="form-group">
									<label for="kode" class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="hidden" id="id" class="form-control" />
										<input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $r[kode]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="nama_dasawisma" class="col-sm-4 control-label">Nama Dasawisma</label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo $r[nama_dasawisma]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan</label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kelurahan" class="col-sm-4 control-label">Kelurahan</label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $r[kelurahan]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $r[kecamatan]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="lingkungan" class="col-sm-4 control-label">Lingkungan</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="nama_lingkungan" id="lingkungan" value="<?php echo $r[nama_lingkungan]; ?>" placeholder="Lingkungan" readonly>
									</div>
								</div>


							</div><!-- /.box-body -->
						</div>

						<!-- <div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="penerima_bantuan" class="col-sm-4 control-label">Penerima Bantuan<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<select class="validate[required] form-control" name='penerima_bantuan' id='penerima_bantuan' readonly>
											<option><?php echo $r[penerima_bantuan]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="jenis_bantuan" class="col-sm-4 control-label">Jenis Bantuan</label>
									<div class="col-sm-5">
										<select class="form-control" name='jenis_bantuan' id='jenis_bantuan' readonly>
											<option><?php echo $r[jenis_bantuan]; ?></option>
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


						<div class="divider"></div>
					<?php

					}
					?>

					<div class="form-group">

						<div class="col-sm-offset-2 col-sm-5">

							<a class="btn btn-danger" title="Kembali" onclick="self.history.back()"><i class="fa fa-remove"></i>
								Kembali
							</a>
						</div>
					</div>
					</br>


				</form>
			</div>

<?php
	}
}
?>