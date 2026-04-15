<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "modul/ibubayi/aksi_ibubayi.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (isset($_POST['chk']) == "") {
?>
				<script>
					alert('Opsi Belum Di pilih');
					window.location.href = 'appmaster.php?module=ibubayi';
				</script>
			<?php
			}
			$chk = $_POST['chk'];
			$chkcount = count($chk);

			?>
			<center>
				<h3 class="box-title">LIHAT DATA IBU/BALITA/BAYI</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->

				<form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=melahirkan" id="popup-validation">
					<?php
					for ($i = 0; $i < $chkcount; $i++) {
						$id = $chk[$i];
						$res = pg_query($koneksi, "select * from ibubayi where id=" . $id);
						$r = pg_fetch_array($res);
					?>
						<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
						<div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
									<div class="col-sm-4">
										<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="tglentry" class="col-sm-4 control-label">Tgl.Melahirkan <span class="text-danger"> *</span></label>
									<div class="col-sm-4">
										<input type="text" class="validate[required,custom[date]] form-control" id="tglmelahirkan" name="tglmelahirkan" placeholder="YYYY-MM-DD" value="<?php echo $r[tglmelahirkan]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="bulan" class="col-sm-4 control-label">Bulan<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<select class=" validate[required] form-control" name='bulan' id='bulan' disabled>
											<option><?php echo $r[bulan]; ?></option>
											<option value="Januari">Januari</option>
											<option value="Februari">Februari</option>
											<option value="Maret">Maret</option>
											<option value="April">April</option>
											<option value="Mei">Mei</option>
											<option value="Juni">Juni</option>
											<option value="Juli">Juli</option>
											<option value="Agustus">Agustus</option>
											<option value="September">September</option>
											<option value="Oktober">Oktober</option>
											<option value="November">November</option>
											<option value="Desember">Desember</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="tahun" class="col-sm-4 control-label">Tahun<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required] form-control" id="tahun" name="tahun" placeholder="yyyy" value="<?php echo $r[tahun]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
									<div class="col-sm-6">
										<input type="hidden" id="id" class="form-control" />
										<input type="text" class="validate[required,custom[number]] form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $r[nik]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="text" class="validate[required] form-control" name="noreg" id="noreg" placeholder="noreg" value="<?php echo $r[noreg]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="namaibu" class="col-sm-4 control-label">Nama Ibu<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="namaibu" id="nama" placeholder="Nama Ibu" value="<?php echo $r[namaibu]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="namakel" id="namakel" placeholder="Nama Kelurahan" value="<?php echo $r[kelurahan]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="namakec" id="namakec" placeholder="Nama Kecamatan" value="<?php echo $r[kecamatan]; ?>" readonly>
									</div>
								</div>

							</div><!-- /.box-body -->
						</div>

						<div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan' disabled>
											<option><?php echo $r[lingkungan]; ?></option>
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
										<select class='validate[required] form-control' name='dasawisma' id='dasawisma' disabled>
											<option><?php echo $r[dasawisma]; ?></option>
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
									<label for="namasuami" class="col-sm-4 control-label">Nama Suami <span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<select class='validate[required] form-control select2' name='namasuami' id='namasuami' disabled>
											<option><?php echo $r[namasuami]; ?></option>
											<?php
											$lk = pg_query($koneksi, "SELECT * FROM datawarga where jenkel='Laki-Laki' and kodekel='$_SESSION[ses_kodekel]' order by nama");
											while ($p = pg_fetch_array($lk)) {

												echo "
												<option value=\"$p[nama]\">$p[nama]</option>\n";
											}
											echo "";


											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="statusibu" class="col-sm-4 control-label">Status Ibu<span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<select class=" validate[required] form-control" name='statusibu' id='statusibu' readonly>
											<option><?php echo $r[statusibu]; ?></option>
											<option value="Melahirkan">Melahirkan</option>
											<option value="Nifas">Nifas</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="catatan2" class="col-sm-4 control-label">II. Catatan Kelahiran</label>
								</div>


								<div class="form-group">
									<label for="namabayi" class="col-sm-4 control-label">Nama Bayi<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="namabayi" id="namabayi" value="<?php echo $r[namabayi]; ?>" placeholder="Nama Bayi" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin<span class="text-danger"> *</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='jenkel' id='jenkel' readonly>
											<option><?php echo $r[jenkel]; ?></option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="akte" class="col-sm-4 control-label">Memiliki Akte Lahir<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='akte' id='akte' readonly>
											<option><?php echo $r[akte]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="catatan3" class="col-sm-6 control-label">III. Catatan Kematian</label>
								</div>
								<div class="form-group">
									<label for="namabayik" class="col-sm-4 control-label">Nama Ibu/Bayi/Balita</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="namabayik" id="namabayik" placeholder="Nama Bayi/Balita" value="<?php echo $r[namabayik]; ?>" readonly>
									</div>
								</div>

								<div class=" form-group">
									<label for="statusibuk" class="col-sm-4 control-label">Status Ibu/Bayi/Balita</label>
									<div class="col-sm-5">
										<select class="form-control" name='statusibuk' id='statusibuk' readonly>
											<option><?php echo $r[statusibuk]; ?></option>
											<option value="Ibu">Ibu</option>
											<option value="Balita">Balita</option>
											<option value="Bayi">Bayi</option>

										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="jenkelk" class="col-sm-4 control-label">Jenis Kelamin Bayi/Balita</label>
									<div class="col-sm-5">
										<select class="form-control" name='jenkelk' id='jenkelk' readonly>
											<option><?php echo $r[jenkelk]; ?></option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>

										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="tglmeninggal" class="col-sm-4 control-label">Tgl.Meninggal</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="tglmeninggal" name="tglmeninggal" placeholder="YYYY-MM-DD" value="<?php echo $r[tglmeninggal]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="sebabmeninggal" class="col-sm-4 control-label">Sebab Meninggal</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="sebabmeninggal" name="sebabmeninggal" placeholder="Sebab Meninggal" value="<?php echo $r[sebabmeninggal]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?php echo $r[keterangan]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="userentry" class="col-sm-4 control-label">User Entry</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="userentry" id="userentry" value="<?php echo $r[userentry]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo $r[waktuentry]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="level" class="col-sm-4 control-label">Level User</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="level" id="level" value="<?php echo $r['level']; ?>" readonly>
									</div>
								</div>

							</div><!-- /.box-body -->
						</div>


						<div class="form-group">
							<div class="col-sm-10">
								<label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
							</div>
						</div>

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
					<br>

				</form>
			</div>

<?php
	}
}
?>