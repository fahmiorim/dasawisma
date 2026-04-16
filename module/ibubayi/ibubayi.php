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

<script type="text/javascript">
	$(function() {
		$("#tglmelahirkan").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tglmelahirkan").change(function() {
			$("#tglmelahirkan").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>
<script type="text/javascript">
	$(function() {
		$("#tglmeninggal").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tglmeninggal").change(function() {
			$("#tglmeninggal").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>

<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {
	include "../../config/koneksi.php";
	$aksi = "module/ibubayi/aksi_ibubayi.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			// --- LOGIKA PAGINATION & QUERY ---
			$batas = 10;
			$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
			$posisi = ($hal - 1) * $batas;

			if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
				$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM ibubayi");
				$title = "DATA IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA";
				$query_data = "SELECT * FROM ibubayi ORDER BY id DESC LIMIT $batas OFFSET $posisi";
			} else {
				$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
				$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM ibubayi WHERE kodekel='$kodekel'");
				$title = "DATA IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA DESA " . $_SESSION['ses_namakel'];
				$query_data = "SELECT * FROM ibubayi WHERE kodekel='$kodekel' ORDER BY id DESC LIMIT $batas OFFSET $posisi";
			}

			$count_result = pg_fetch_array($count_query);
			$jmldata = $count_result['total'];
			$jmlhalaman = ceil($jmldata / $batas);
			?>

				<div class='box-header with-border'>
					<h3 class='box-title'><?php echo $title; ?></h3>
				</div>
				
				<div class='box-body'>
					<div style="text-align:right; margin-bottom:10px;">
						<a class="btn bg-green" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
						<a class="btn bg-purple" href="?module=ibubayi&act=tambahibubayi"><i class="fa fa-plus"></i> Tambah</a>
					</div>

					<div class="table-responsive">
						<table class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th width="50">No</th>
									<th>Tahun</th>
									<th>Bulan</th>
									<th>NIK</th>
									<th>Nama Ibu</th>
									<th>Nama Suami</th>
									<th>Nama Bayi</th>
									<th>Jenis Kelamin</th>
									<th>Status Ibu</th>
									<th>Akte Lahir</th>
									<th>Dasawisma</th>
									<th>Lingkungan</th>
									<th>Desa/Kelurahan</th>
									<th>Kecamatan</th>
									<th width="120">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = $posisi + 1;
								$lingk = pg_query($koneksi, $query_data);

								if (pg_num_rows($lingk) > 0) {
									while ($lk = pg_fetch_array($lingk)) {
										echo "<tr>
											<td>$no</td>
											<td>{$lk['tahun']}</td>
											<td>{$lk['bulan']}</td>
											<td>{$lk['nik']}</td>
											<td>{$lk['namaibu']}</td>
											<td>{$lk['namasuami']}</td>
											<td>{$lk['namabayi']}</td>
											<td>{$lk['jenkel']}</td>
											<td>{$lk['statusibu']}</td>
											<td>{$lk['akte']}</td>
											<td>{$lk['dasawisma']}</td>
											<td>{$lk['lingkungan']}</td>
											<td>{$lk['kelurahan']}</td>
											<td>{$lk['kecamatan']}</td>
											<td>
												<a href='?module=lihatibubayi&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
												<a href='?module=editibubayi&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
												<a href='?module=hapusibubayi&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
											</td>
										</tr>";
										$no++;
									}
								} else {
									echo "<tr><td colspan='16' class='text-center'>Tidak ada data</td></tr>";
								}
								?>
							</tbody>

						</table>
					</div>
				</div>

				<div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<?php
						$batas_halaman = 5;
						$start = max(1, $hal - floor($batas_halaman / 2));
						$end = min($jmlhalaman, $start + $batas_halaman - 1);

						if ($hal > 1) {
							echo "<li><a href='?module=ibubayi&hal=1'>&laquo;</a></li>";
						}
						for ($i = $start; $i <= $end; $i++) {
							$aktif = ($i == $hal) ? "class='active'" : "";
							echo "<li $aktif><a href='?module=ibubayi&hal=$i'>$i</a></li>";
						}
						if ($hal < $jmlhalaman) {
							echo "<li><a href='?module=ibubayi&hal=$jmlhalaman'>&raquo;</a></li>";
						}
						?>
					</ul>
				</div>
			<?php
			break;
		case "tambahibubayi":

		?>
			<section class="content-header">
				<h1 class="text-center">Form Tambah Data Ibu/Balita/Bayi</h1>
			</section>

			<div class="box box-info" style="margin-top: 20px;">
				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=ibubayi&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="bulan" class="col-sm-4 control-label">Bulan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<select class=" validate[required] form-control" name='bulan' id='bulan'>
										<option value="">Pilih</option>
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
									<input type="text" class="validate[required] form-control" id="tahun" name="tahun" placeholder="yyyy" value="<?php echo date('Y'); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="catatan1" class="col-sm-6 control-label">I. Catatan Kehamilan</label>
							</div>

							<div class="form-group">
								<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<input type="hidden" id="id" class="form-control" />
									<input type="text" class="validate[required,custom[number]] form-control" name="nik" id="nik" placeholder="NIK" readonly>
								</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal6"><i class="fa fa-search"></i> Cari</button>
							</div>

							<div class="form-group">
								<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="namaibu" class="col-sm-4 control-label">Nama Ibu<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="namaibu" id="nama" placeholder="Nama Ibu" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namakel" id="namakel" placeholder="Nama Kelurahan" readonly>
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
									<input type="text" class="form-control" name="namakec" id="namakec" placeholder="Nama Kecamatan" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan' readonly>
										<option value="">Pilih</option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode");
										while ($p = pg_fetch_array($lk)) {
											echo "<option value=\"{$p['nama_lingkungan']}\">{$p['nama_lingkungan']}</option>\n";
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="kode" id="kode" placeholder="Kode" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control' name='dasawisma' id='dasawisma' readonly>
										<option value="">Pilih</option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='{$_SESSION['ses_kodekel']}' order by kode");
										while ($p = pg_fetch_array($lk)) {
											echo "<option value=\"{$p['nama_dasawisma']}\">{$p['nama_dasawisma']}</option>\n";
										}
										?>
									</select>
								</div>
							</div>

						</div><!-- /.box-body -->
					</div>

					<div class="col-md-6">
						<div class="box-body">
							<div class="form-group">
								<label for="namasuami" class="col-sm-4 control-label">Nama Suami <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='namasuami' id='namasuami'>
										<option value="">Pilih</option>
										<?php
										$lk = pg_query($koneksi, "SELECT * FROM datawarga where jenkel='Laki-Laki' and kodekel='{$_SESSION['ses_kodekel']}' order by nama");
										while ($p = pg_fetch_array($lk)) {
											echo "<option value=\"{$p['nama']}\">{$p['nama']}</option>\n";
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="statusibu" class="col-sm-4 control-label">Status Ibu<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<select class=" validate[required] form-control" name='statusibu' id='statusibu'>
										<option value="">Pilih</option>
										<option value="Hamil">Hamil</option>
										<option value="Melahirkan">Melahirkan</option>
										<option value="Nifas">Nifas</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="catatan2" class="col-sm-4 control-label">II. Catatan Kelahiran</label>
							</div>

							<div class="form-group">
								<label for="namabayi" class="col-sm-4 control-label">Nama Bayi</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namabayi" id="namabayi" placeholder="Nama Bayi" value="-">
								</div>
							</div>

							<div class="form-group">
								<label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin</label>
								<div class="col-sm-4">
									<select class="form-control" name='jenkel' id='jenkel'>
										<option value="-">-</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="akte" class="col-sm-4 control-label">Memiliki Akte Lahir</label>
								<div class="col-sm-4">
									<select class="form-control" name='akte' id='akte'>
										<option value="-">-</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="tglmelahirkan" class="col-sm-4 control-label">Tgl Melahirkan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="tglmelahirkan" name="tglmelahirkan" placeholder="YYYY-MM-DD" value="">
								</div>
							</div>

							<div class="form-group">
								<label for="catatan3" class="col-sm-6 control-label">III. Catatan Kematian</label>
							</div>
							<div class="form-group">
								<label for="namabayik" class="col-sm-4 control-label">Nama Ibu/Bayi/Balita</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namabayik" id="namabayik" placeholder="Nama Bayi/Balita" value="-">
								</div>
							</div>

							<div class="form-group">
								<label for="statusibuk" class="col-sm-4 control-label">Status Ibu/Bayi/Balita</label>
								<div class="col-sm-5">
									<select class="form-control" name='statusibuk' id='statusibuk'>
										<option value="-">-</option>
										<option value="Ibu">Ibu</option>
										<option value="Balita">Balita</option>
										<option value="Bayi">Bayi</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenkelk" class="col-sm-4 control-label">Jenis Kelamin Bayi/Balita</label>
								<div class="col-sm-5">
									<select class="form-control" name='jenkelk' id='jenkelk'>
										<option value="-">-</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="tglmeninggal" class="col-sm-4 control-label">Tgl.Meninggal</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="tglmeninggal" name="tglmeninggal" placeholder="YYYY-MM-DD" value="">
								</div>
							</div>

							<div class="form-group">
								<label for="sebabmeninggal" class="col-sm-4 control-label">Sebab Meninggal</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="sebabmeninggal" name="sebabmeninggal" placeholder="Sebab Meninggal" value="-">
								</div>
							</div>

							<div class="form-group">
								<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="-">
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
									<input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo date('H:i:s'); ?>" readonly>
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

					<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:800px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Data Warga</h4>
								</div>
								<div class="modal-body">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NIK</th>
												<th>No.Reg</th>
												<th>Nama</th>
												<th>Lingkungan</th>
												<th>Kelurahan</th>
												<th>Kecamatan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
												$qu = pg_query($koneksi, "SELECT * FROM datawarga where jenkel='Perempuan' order by nik");
											} else {
												$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
												$qu = pg_query($koneksi, "SELECT * FROM datawarga where jenkel='Perempuan' and kodekel='$kodekel' order by nik");
											}
											while ($data = pg_fetch_array($qu)) {
											?>
												<tr class="pilih6" data-id="<?php echo $data['id']; ?>" data-nik="<?php echo $data['nik']; ?>" data-noreg="<?php echo $data['noreg']; ?>" data-nama="<?php echo $data['nama']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-namakel="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-namakec="<?php echo $data['kecamatan']; ?>" data-kode="<?php echo $data['kode']; ?>" data-dasawisma="<?php echo $data['dasawisma']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">

													<td><?php echo $data['nik']; ?></td>
													<td><?php echo $data['noreg']; ?></td>
													<td><?php echo $data['nama']; ?></td>
													<td><?php echo $data['lingkungan']; ?></td>
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

					<div class="col-md-12">
						<div class="box-footer">
							<a type="submit" href="appmaster.php?module=ibubayi" name="cmdibubayi" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
						</div><!-- /.box-footer -->
				</form>
			</div>

<?php
	}
}
?>
