<script type="text/javascript">
	function startCalc() {
		interval = setInterval("calc()", 1)
	}

	function calc() {
		one = document.keluarga.anggotakelpr.value;
		two = document.keluarga.anggotakelw.value;

		document.keluarga.anggotakel.value = (one * 1) + (two * 1)
	}

	function stopCalc() {
		clearInterval(interval)
	}
</script>

<script type="text/javascript">
	function startCalc2() {
		interval = setInterval("calc2()", 1)
	}

	function calc2() {
		tree = document.keluarga.balitapr.value;
		four = document.keluarga.balitaw.value;

		document.keluarga.balita.value = (tree * 1) + (four * 1)
	}

	function stopCalc2() {
		clearInterval(interval)
	}
</script>


<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "module/keluarga/aksi_keluarga.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (!isset($_GET['id']) || $_GET['id'] == "") {
?>
				<script>
					alert('Data tidak ditemukan');
					window.location.href = 'appmaster.php?module=keluarga';
				</script>
			<?php
			}
			$id = $_GET['id'];

			?>
			<center>
				<h3 class="box-title">Edit Data Keluarga PKK Kabupaten Batu Bara</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->

				<form method="POST" class="form-horizontal" enctype="multipart/form-data" name="keluarga" action="<?php echo $aksi; ?>?module=keluarga&act=update" id="popup-validation">
					<?php
					$res = pg_query($koneksi, "select * from keluarga where id=" . $id);
					$r = pg_fetch_array($res);
					?>
						<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
						<div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
									<div class="col-sm-4">
										<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
									<div class="col-sm-5">
										<input type="hidden" id="id" class="form-control" />
										<input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" value="<?php echo $r[noreg]; ?>" readonly>
									</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal9"><i class="fa fa-search"></i> Cari</button>
								</div>

								<div class="form-group">
									<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
									<div class="col-sm-6">

										<input type="text" class="validate[required,custom[number]] form-control" name="nokk" id="nokk" value="<?php echo $r[nokk]; ?>" placeholder="No.KK" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="nokrt" id="nokrt" placeholder=" No.KRT" value="<?php echo $r[nokrt]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="namakk" class="col-sm-4 control-label">Kepala Rumah Tangga<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="namakk" id="nama" placeholder="Kepala Rumah Tangga" value="<?php echo $r[namakk]; ?>" readonly>
									</div>
								</div>


								<div class="form-group">
									<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="nama_lingkungan" id="lingkungan" placeholder="Lingkungan" value="<?php echo $r[lingkungan]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma<span class="text-danger"> *</span></label>
									<div class="col-sm-7">
										<input type="text" class="validate[required] form-control" name="dasawisma" id="dasawisma" placeholder="Nama Dasawisma" value="<?php echo $r[dasawisma]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="jlhkel" class="col-sm-5 control-label">I. Data Anggota Keluarga</label>
								</div>

								<div class="form-group">
									<label for="anggotakelpr" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="anggotakelpr" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Laki-Laki" value="<?php echo $r[anggotakelpr]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="anggotakelw" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="anggotakelw" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Perempuan" value="<?php echo $r[anggotakelw]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="anggotakel" class="col-sm-4 control-label">Total<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]]  form-control" name="anggotakel" placeholder="Total" value="<?php echo $r[anggotakel]; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="jlhkk" class="col-sm-4 control-label">Jumlah KK<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="jlhkk" id="jlhkk" placeholder="Jumlah KK" value="<?php echo $r[jlhkk]; ?>">
									</div>
								</div>



								<!--<div class="form-group">  
					 <label for="balita" class="col-sm-4 control-label">Jumlah Balita<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]]  form-control" name="balita" placeholder="Jumlah Balita" value="<?php echo $r[balita]; ?>" >
                      </div>
					</div>-->

								<div class="form-group">
									<label for="jlhbalita" class="col-sm-5 control-label">Jumlah Balita</label>
								</div>

								<div class="form-group">
									<label for="balitapr" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="balitapr" id="balitapr" onFocus="startCalc2();" onBlur="stopCalc2();" placeholder="Laki-Laki" value="<?php echo $r[balitapr]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="balitaw" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="balitaw" id="balitaw" onFocus="startCalc2();" onBlur="stopCalc2();" placeholder="Perempuan" value="<?php echo $r[balitaw]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="balita" class="col-sm-4 control-label">Jumlah Balita<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]]  form-control" name="balita" value="<?php echo $r[balita]; ?>" placeholder="Jumlah Balita" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="pus" class="col-sm-4 control-label">PUS<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="pus" id="pus" value="<?php echo $r[pus]; ?>" placeholder="PUS">
									</div>
								</div>

								<div class="form-group">
									<label for="wus" class="col-sm-4 control-label">WUS<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="wus" id="wus" value="<?php echo $r[wus]; ?>" placeholder="WUS">
									</div>
								</div>

								<div class="form-group">
									<label for="bumil" class="col-sm-4 control-label">Ibu Hamil<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="bumil" id="bumil" value="<?php echo $r[bumil]; ?>" placeholder="Ibu Hamil">
									</div>
								</div>

								<div class="form-group">
									<label for="lansia" class="col-sm-4 control-label">Lansia<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="lansia" id="lansia" value="<?php echo $r[lansia]; ?>" placeholder="Lansia">
									</div>
								</div>

								<div class="form-group">
									<label for="buta3" class="col-sm-4 control-label">3 Buta<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="buta3" id="buta3" value="<?php echo $r[buta3]; ?>" placeholder="3 Buta">
									</div>
								</div>
								<div class="form-group">
									<label for="ibum" class="col-sm-4 control-label">Ibu Menyusui<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="ibum" id="ibum" value="<?php echo $r[ibumenyusui]; ?>" placeholder="Ibu Menyusui">
									</div>
								</div>


								<div class="form-group">
									<label for="kbk" class="col-sm-4 control-label">Berkebutuhan Khusus<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required,custom[number]] form-control" name="kbk" id="kbk" value="<?php echo $r[kbk]; ?>" placeholder="Berkebutuhan Khusus">
									</div>
								</div>

								<div class="form-group">
									<label for="makanan" class="col-sm-4 control-label">Makanan Pokok Sehari-hari<span class="text-danger"> *</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='makanan'>
											<option><?php echo $r[makanan]; ?></option>
											<option value="Beras">Beras</option>
											<option value="Non Beras">Non Beras</option>
										</select>
									</div>
								</div>

								<!--<div class="form-group">
					<label for="jenis_makanan" class="col-sm-4 control-label">Jenis Makanan</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="jenis_makanan" value="<?php echo $r[jenis_makanan]; ?>" placeholder="Jenis Makanan">
                     </div>
					 </div>-->

							</div><!-- /.box-body -->
						</div>

						<div class="col-md-6">
							<div class="box-body">

								<div class="form-group">
									<label for="jamban" class="col-sm-4 control-label">Mempunyai Jamban<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='jamban'>
											<option><?php echo $r[jamban]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="jlhjamban" class="col-sm-4 control-label">Jumlah Jamban<span class="text-danger"> *</span></label>
									<div class="col-sm-3">
										<input type="text" class="validate[required] form-control" name="jlhjamban" id="jlhjamban" value="<?php echo $r[jlhjamban]; ?>" placeholder="Jumlah Jamban">
									</div>
								</div>

								<div class="form-group">
									<label for="sumberair" class="col-sm-4 control-label">Sumber Air Keluarga<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='sumberair'>
											<option><?php echo $r[sumberair]; ?></option>
											<option value="PDAM">PDAM</option>
											<option value="Sumur">Sumur</option>
											<option value="Sungai">Sungai</option>
											<option value="Lainnya">Lainnya</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="sampah" class="col-sm-4 control-label">Mempunyai Tempat Sampah<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='sampah'>
											<option><?php echo $r[sampah]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="spal" class="col-sm-4 control-label">Mempunyai SPAL<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='spal'>
											<option><?php echo $r[spal]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="p4k" class="col-sm-4 control-label">Menempul Stiker P4K<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='p4k'>
											<option><?php echo $r[p4k]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="rumah" class="col-sm-4 control-label">Kriteria Rumah<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='rumah'>
											<option><?php echo $r[rumah]; ?></option>
											<option value="Sehat">Sehat</option>
											<option value="Kurang Sehat">Kurang Sehat</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="up2k" class="col-sm-4 control-label">Aktifitas UP2K<span class="text-danger">*</label>
									<div class="col-sm-4">
										<select class="validate[required] form-control" name='up2k'>
											<option><?php echo $r[up2k]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="jenis_usaha" class="col-sm-4 control-label">Jenis Usaha UP2K<span class="text-danger">*</label>
									<div class="col-sm-6">
										<select class='validate[required] form-control' name='jenis_usaha' id='jenis_usaha'>
											<option><?php echo $r[jenis_usaha]; ?></option>
											<?php
											$lk = pg_query($koneksi, "SELECT * FROM mstkomoditi order by jenis_komoditi");
											while ($p = pg_fetch_array($lk)) {

												echo "
												<option value=\"$p[nama_komoditi]\">$p[nama_komoditi]</option>\n";
											}
											echo "";


											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="kes_lingk" class="col-sm-4 control-label">Aktifitas Kesehatan Lingkungan<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='kes_lingk'>
											<option><?php echo $r[kes_lingk]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="pekarangan" class="col-sm-4 control-label">Pemanfaatan Pekarangan<span class="text-danger">*</label>
									<div class="col-sm-4">
										<select class="validate[required] form-control" name='pekarangan'>
											<option><?php echo $r[pekarangan]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="komoditi_lahan" class="col-sm-4 control-label">Komoditi Pekarangan<span class="text-danger">*</label>
									<div class="col-sm-6">
										<select class='validate[required] form-control' name='komoditi_lahan' id='komoditi_lahan'>
											<option><?php echo $r[komoditi_lahan]; ?></option>
											<?php
											$lk = pg_query($koneksi, "SELECT * FROM mstkategori order by id");
											while ($p = pg_fetch_array($lk)) {

												echo "
												<option value=\"$p[kategori]\">$p[kategori]</option>\n";
											}
											echo "";


											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="industri" class="col-sm-4 control-label">Industri Rumah Tangga<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='industri'>
											<option><?php echo $r[industri]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="komoditi_industri" class="col-sm-4 control-label">Komoditi Industri<span class="text-danger">*</span></label>
									<div class="col-sm-6">
										<select class='validate[required] form-control' name='komoditi_industri' id='komoditi_industri'>
											<option><?php echo $r[komoditi_industri]; ?></option>
											<option value="Pangan">Pangan</option>
											<option value="Sandang">Sandang</option>
											<option value="Jasa">Jasa</option>
											<option value="Konveksi">Konveksi</option>
											<option value="Tidak ada">Tidaka ada</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="nama_komoditi" class="col-sm-4 control-label">Nama Komoditi<span class="text-danger">*</label>
									<div class="col-sm-8">
										<input type="text" class="validate[required] form-control" id="nama_komoditi" name="nama_komoditi" placeholder="Nama Komoditi" value="<?php echo $r[nama_komoditi_industri]; ?>">
									</div>
								</div>


								<div class="form-group">
									<label for="bakti" class="col-sm-4 control-label">Kerja Bakti<span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<select class=" validate[required] form-control" name='bakti'>
											<option><?php echo $r[bakti]; ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
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
										<input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang"; ?>" readonly>
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

					<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:1000px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Data Kepala Rumah Tangga</h4>
								</div>
								<div class="modal-body">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.ID</th>
												<th>No.KRT</th>
												<th>No.KK</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Lingkungan</th>
												<th>Dasawisma</th>
												<th>Kelurahan</th>
												<th>Kecamatan</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM datawarga where kodekel='$_SESSION[ses_kodekel]' and stskel='Kepala Rumah Tangga' order by nama");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih9" data-id="<?php echo $data['id']; ?>" data-noreg="<?php echo $data['noreg']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>" data-nama="<?php echo $data['nama']; ?>" data-nokk="<?php echo $data['nokk']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>" data-dasawisma="<?php echo $data['dasawisma']; ?>">

													<td><?php echo $data['noreg']; ?></td>
													<td><?php echo $data['nokrt']; ?></td>
													<td><?php echo $data['nokk']; ?></td>
													<td><?php echo $data['nama']; ?></td>
													<td><?php echo $data['alamat']; ?></td>
													<td><?php echo $data['lingkungan']; ?></td>
													<td><?php echo $data['dasawisma']; ?></td>
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
	}
?>