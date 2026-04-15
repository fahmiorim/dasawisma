<script type="text/javascript">
	$(function() {
		$("#tgldaftar").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tgldaftar").change(function() {
			$("#tgldaftar").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>

<script type="text/javascript">
	$(function() {
		$("#tgllahir").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tgllahir").change(function() {
			$("#tgllahir").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>

<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function() {
		//apabila terjadi event onchange terhadap object <select id=propinsi>
		$("#propinsi").change(function() {
			var propinsi = $("#propinsi").val();
			$.ajax({
				url: "modul/datawarga2/ambilkota.php",
				data: "propinsi=" + propinsi,
				cache: false,
				success: function(msg) {
					//jika data sukses diambil dari server kita tampilkan
					//di <select id=kota>
					$("#kota").html(msg);
				}
			});
		});
		$("#kota").change(function() {
			var kota = $("#kota").val();
			$.ajax({
				url: "modul/datawarga2/ambilkecamatan.php",
				data: "kota=" + kota,
				cache: false,
				success: function(msg) {
					$("#kecamatan").html(msg);
				}
			});
		});

		$("#kecamatan").change(function() {
			var kecamatan = $("#kecamatan").val();
			$.ajax({
				url: "modul/datawarga2/ambilkelurahan.php",
				data: "kecamatan=" + kecamatan,
				cache: false,
				success: function(msg) {
					$("#kelurahan").html(msg);
				}
			});
		});

		$("#kelurahan").change(function() {
			var kelurahan = $("#kelurahan").val();
			$.ajax({
				url: "modul/datawarga2/ambilkodepos.php",
				data: "kelurahan=" + kelurahan,
				cache: false,
				success: function(msg) {
					$("#kodepos").html(msg);
				}
			});
		});

	});
</script>

<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	$aksi = "modul/datawarga2/aksi_datawarga2.php";

	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$datawarga = pg_query($koneksi, "SELECT * FROM datawarga order by kodekel");
$count = pg_num_rows($datawarga);
echo "
	
";
 ?>
				<div class='box-header'>
					<h2 class='box-title'>DATA WARGA</h2>
				</div>
				<form method="post" name="frm">

					<div style="text-align:right">

						<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>

						<a class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=datawarga2&act=tambahdatawarga2"><i class="fa fa-user-plus"></i> Tambah</a>

						<?php
						if ($count > 0) {
						?>

							<button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_datawarga2();"><i class="fa fa-desktop"></i> Lihat</button>
							<button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_datawarga23();"><i class="fa fa-edit"></i> Edit Data</button>
							<button class="btn btn-danger" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_datawarga2();"><i class="fa fa-remove"></i> Hapus </button>
					</div>

				<?php } ?>


				<div class='box-body'>
					<div class="table-responsive no-padding">
						<table id='example1' class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th>
										<input type="checkbox" name="select_all" id="select_all" value="" />
									</th>
									<th>No</th>
									<th>Tgl.Terdata</th>
									<th>No.ID</th>
									<th>No.KRT</th>
									<th>Nama KRT</th>
									<th>No.KK</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Dasawisma</th>
									<th>Lingkungan</th>
									<th>Kelurahan</th>
									<th>Kecamatan</th>
									<th>Tempat</th>
									<th>Tgl.Lahir</th>
									<th>Jenis Kelamin</th>
									<th>Jabatan PKK</th>
									<th>Status</th>
									<th>Aktif</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$batas = 10;
								$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
								$posisi = ($hal - 1) * $batas;
								
								$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga");
								$count_result = pg_fetch_array($count_query);
								$jmldata = $count_result['total'];
								$jmlhalaman = ceil($jmldata/$batas);
								
								$no = $posisi + 1;
								$bid = pg_query($koneksi, "select * from datawarga order by nokrt,kodekel LIMIT $batas OFFSET $posisi");

								while ($bd = pg_fetch_array($bid)) {
								?>
									<tr>
										<td style='text-align:center'>

											<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bd['id']; ?>" />
										</td>
										<td><?php echo " $no"; ?></td>
										<td><?php echo " $bd[tgldaftar]"; ?></td>
										<td><?php echo " $bd[noreg]"; ?></td>
										<td><?php echo " $bd[nokrt]"; ?></td>
										<td><?php echo " $bd[namakrt]"; ?></td>
										<td><?php echo " $bd[nokk]"; ?></td>
										<td><?php echo " $bd[nik]"; ?></td>
										<td><?php echo " $bd[nama]"; ?></td>
										<td><?php echo " $bd[alamat]"; ?></td>
										<td><?php echo " $bd[dasawisma]"; ?></td>
										<td><?php echo " $bd[lingkungan]"; ?></td>
										<td><?php echo " $bd[kelurahan]"; ?></td>
										<td><?php echo " $bd[kecamatan]"; ?></td>
										<td><?php echo " $bd[tempat]"; ?></td>
										<td><?php echo " $bd[tgllahir]"; ?></td>
										<td><?php echo " $bd[jenkel]"; ?></td>
										<td><?php echo " $bd[jabpkk]"; ?></td>
										<td><?php echo " $bd[stsanggota]"; ?></td>
										<td><?php echo " $bd[stsaktif]"; ?></td>

									</tr>
								<?php
									$no++;
								}
								?>
							</tbody>

						</table>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
							<?php
							$batas_halaman = 5;
							$start = max(1, $hal - floor($batas_halaman/2));
							$end = min($jmlhalaman, $start + $batas_halaman - 1);
							if($end - $start < $batas_halaman - 1){
								$start = max(1, $end - $batas_halaman + 1);
							}
							if($hal > 1){
								$prev = $hal - 1;
								echo "<li><a href=\"?module=datawarga2&hal=1\">&laquo;</a></li>";
								echo "<li><a href=\"?module=datawarga2&hal=$prev\">&lsaquo;</a></li>";
							}
							for($i=$start; $i<=$end; $i++){
								$aktif = ($i == $hal) ? "class=\"active\"" : "";
								echo "<li $aktif><a href=\"?module=datawarga2&hal=$i\">$i</a></li>";
							}
							if($hal < $jmlhalaman){
								$next = $hal + 1;
								echo "<li><a href=\"?module=datawarga2&hal=$next\">&rsaquo;</a></li>";
								echo "<li><a href=\"?module=datawarga2&hal=$jmlhalaman\">&raquo;</a></li>";
							}
							?>
						</ul>
					</div>
					</div>
				</form>
			</div>

			</div>
		<?php
			break;
		case "tambahdatawarga2":
			$a = $tgl_kode;
			$kdkel = $_SESSION[ses_kodekel];

			$rand4 = randpass4(3);
		?>
			<center>
				<h3 class="box-title">TAMBAH DATA WARGA</h3>
			</center>



				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=datawarga2&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="nokrt" class="col-sm-4 control-label">No.KRT <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" placeholder="nokrt" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal11"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
								<label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="validate[required] form-control" name="namakrt" id="namakrt" placeholder="Nama Kepala Rumah Tangga" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="noreferal" class="col-sm-4 control-label">
									No.ID <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="validate[required,custom[number]] form-control" readonly name="noreg" placeholder="No.ID" value="<?php echo "$kdkel$a$rand4"; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class='validate[required] form-control select2' name='nama_lingkungan'>
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
								<label for="kriteria" class="col-sm-4 control-label">Kriteria Kader <span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class='validate[required] form-control select2' name='kriteria'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM kriteria order by kode");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[nama_kriteria]\">$p[nama_kriteria]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="kode" class="col-sm-4 control-label">Kode Kelurahan <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
								<label for="nama_kel" class="col-sm-4 control-label">Kelurahan</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="nama_kel" id="nama_kel" placeholder="Kelurahan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_lurah" class="col-sm-4 control-label">Nama Lurah</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_lurah" id="nama_lurah" placeholder="Nama Lurah" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" placeholder="Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="dasawisma" class="col-sm-4 control-label">Dasa Wisma <span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class='validate[required] form-control select2' name='dasawisma'>
										<option></option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM dasawisma order by kode");
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
								<label for="tgldaftar" class="col-sm-4 control-label">Tgl.Terdata <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="validate[required,custom[date]] form-control" id="tgldaftar" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang"; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="datawarga" class="col-sm-4 control-label">I. Data Warga</label>
							</div>

							<div class="form-group">
								<label for="stskel" class="col-sm-4 control-label">Status Keluarga <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='stskel'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM mstkeluarga order by id");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[stskeluarga]\">$p[stskeluarga]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK">
								</div>
							</div>

							<div class="form-group">
								<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK">
								</div>
							</div>

							<div class="form-group">
								<label for="nama" class="col-sm-4 control-label">Nama Warga<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="nama" placeholder="Nama Warga">
								</div>
							</div>

							<div class="form-group">
								<label for="tempat" class="col-sm-4 control-label">Tempat Lahir<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="tempat" placeholder="Tempat Lahir">
								</div>
							</div>

							<div class="form-group">
								<label for="tgllahir" class="col-sm-4 control-label">Tgl.Lahir <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="validate[required,custom[date]] form-control" id="tgllahir" name="tgllahir" placeholder="YYYY-MM-DD">
								</div>
							</div>

							<div class="form-group">
								<label for="alamat" class="col-sm-4 control-label">Alamat<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<textarea type="text" class="validate[required] form-control" name="alamat" placeholder="Alamat"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="agama" class="col-sm-4 control-label">Agama<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<select class=" validate[required] form-control" name='agama'>
										<option></option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katholik">Katholik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Khonghuchu">Khonghuchu</option>
									</select>
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="jabpkk" class="col-sm-4 control-label">Jabatan dalam PKK<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='jabpkk' id='jabpkk'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM mstjabatan order by id");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[namajabatan]\">$p[namajabatan]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='jenkel'>
										<option></option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="stskawin" class="col-sm-4 control-label">Status Perkawinan</label>
								<div class="col-sm-5">
									<select class="form-control" name='stskawin'>
										<option></option>
										<option value="Menikah">Menikah</option>
										<option value="Lajang">Lajang</option>
										<option value="Duda">Duda</option>
										<option value="Janda">Janda</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="pendidikan" class="col-sm-4 control-label">Pendidikan<span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class='validate[required] form-control select2' name='pendidikan'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM mstpendidikan order by id");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[namapendidikan]\">$p[namapendidikan]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>



							<div class="form-group">
								<label for="pekerjaan" class="col-sm-4 control-label">Pekerjaan <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='pekerjaan' id='pekerjaan'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM mstpekerjaan order by id");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[namapekerjaan]\">$p[namapekerjaan]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="akseptorkb" class="col-sm-4 control-label">Akseptor KB<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='akseptorkb'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenisakseptor" class="col-sm-4 control-label">Jenis Akseptor <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='form-control select2' name='jenisakseptor'>
										<option></option>
										<?php
										$kr = pg_query($koneksi, "SELECT * FROM akseptorkb order by id");
										while ($p = pg_fetch_array($kr)) {

											echo "
												<option value=\"$p[jenisakseptorkb]\">$p[jenisakseptorkb]</option>\n";
										}
										echo "";


										?>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label for="aktif_posyandu" class="col-sm-4 control-label">Aktif Kegiatan Posyandu<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='aktif_posyandu'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="frekuensi" class="col-sm-4 control-label">Frekuensi/Bulan</label>
								<div class="col-sm-3">
									<input type="text" class="validate[required,custom[number]] form-control" name="frekuensi" placeholder="Frekuensi/Bulan">
								</div>
							</div>

							<div class="form-group">
								<label for="bkb" class="col-sm-4 control-label">Mengikuti Program BKB<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='bkb'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="tabungan" class="col-sm-4 control-label">Memiliki Tabungan<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='tabungan'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="kelbelajar" class="col-sm-4 control-label">Memiliki Kel.Belajar<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='kelbelajar'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label for="paud" class="col-sm-4 control-label">Mengikuti PAUD/Sejenis<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='paud'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="koperasi" class="col-sm-4 control-label">Ikut Kegiatan Koperasi PKK<span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<select class=" validate[required] form-control" name='koperasi'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis_koperasi" class="col-sm-4 control-label">Jenis Koperasi</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="jenis_koperasi" placeholder="Jenis Koperasi">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-7">
									<input type="hidden" class="form-control" name="level" id="level" value="<?php echo $_SESSION['ses_level']; ?>">
								</div>
							</div>



							<div class="form-group">
								<div class="col-sm-5">
									<input type="hidden" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang"; ?>">
								</div>
							</div>


							<div class="form-group">
								<div class="col-sm-7">
									<input type="hidden" class="form-control" name="userentry" id="userentry" value="<?php echo $_SESSION['ses_nama']; ?>">
								</div>
							</div>



						</div><!-- /.box-body -->
					</div>

					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
												<th>Kode Kel</th>
												<th>Kelurahan</th>
												<th>Alamat</th>
												<th>Kode Kec</th>
												<th>Kecamatan</th>
												<th>Nama Lurah</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM kelurahan  ");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih1" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_kel="<?php echo $data['nama_kel']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>" data-nama_lurah="<?php echo $data['nama_lurah']; ?>">

													<td><?php echo $data['kode']; ?></td>
													<td><?php echo $data['nama_kel']; ?></td>
													<td><?php echo $data['alamat']; ?></td>
													<td><?php echo $data['kodekec']; ?></td>
													<td><?php echo $data['nama_kec']; ?></td>
													<td><?php echo $data['nama_lurah']; ?></td>
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

					<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:800px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Data Kepala Rumah Tangga</h4>
								</div>
								<div class="modal-body">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No.KRT</th>
												<th>Nama Kepala Rumah Tangga</th>

											</tr>
										</thead>
										<tbody>
											<?php

											$qu = pg_query($koneksi, "SELECT * FROM datakrt order by nokrt");
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih11" data-id="<?php echo $data['id']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>" data-namakrt="<?php echo $data['namakrt']; ?>">

													<td><?php echo $data['nokrt']; ?></td>
													<td><?php echo $data['namakrt']; ?></td>
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
							<a type="submit" href="appmaster.php?module=datawarga2" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>




<?php

	}
}
?>