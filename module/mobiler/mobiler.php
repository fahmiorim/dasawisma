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
	include "../../config/koneksi.php";
	$aksi = "module/mobiler/aksi_mobiler.php";
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			// --- LOGIKA PAGINATION & QUERY ---
			$batas = 10;
			$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
			$posisi = ($hal - 1) * $batas;

			if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
				$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM mobiler");
				$title = "DATA MOBILER PKK";
				$query_data = "SELECT * FROM mobiler ORDER BY id DESC LIMIT $batas OFFSET $posisi";
			} else {
				$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
				$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM mobiler WHERE kodekel='$kodekel'");
				$title = "DATA MOBILER PKK DESA " . $_SESSION['ses_namakel'];
				$query_data = "SELECT * FROM mobiler WHERE kodekel='$kodekel' ORDER BY id DESC LIMIT $batas OFFSET $posisi";
			}

			$count_result = pg_fetch_array($count_query);
			$jmldata = $count_result['total'];
			$jmlhalaman = ceil($jmldata / $batas);
			?>

				<div class='box-header with-border'>
					<h3 class='box-title'><?php echo $title; ?></h3>
				</div>
				
				<div class='box-body'>
					<div style="text-align:right">
						<a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
						<a  class="btn bg-blue margin" data-toggle="tooltip" data-placement="top" title="Print Laporan" href="?module=lapmobiler" target="_blank"><i class="fa fa-print"></i> Print Laporan</a>
						<a class="btn bg-purple margin" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
						<a class="btn bg-purple margin" href="?module=mobiler&act=tambahmobiler"><i class="fa fa-plus"></i> Tambah</a>
					</div>

					<div class="table-responsive">
						<table class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th width="50">No</th>
									<th>Tgl.Entry</th>
									<th>Nama mobiler</th>
									<th>Penerima</th>
									<th>Status Pengelola</th>
									<th>Dasawisma</th>
									<th>Lingkungan</th>
									<th>Kelurahan</th>
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
											<td>{$lk['tglentry']}</td>
											<td>{$lk['nama_mobiler']}</td>
											<td>{$lk['penerima']}</td>
											<td>{$lk['stspengelola']}</td>
											<td>{$lk['dasawisma']}</td>
											<td>{$lk['lingkungan']}</td>
											<td>{$lk['kelurahan']}</td>
											<td>{$lk['kecamatan']}</td>
											<td>
												<a href='?module=lihatmobiler&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
												<a href='?module=editmobiler&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
												<a href='?module=hapusmobiler&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
											</td>
										</tr>";
										$no++;
									}
								} else {
									echo "<tr><td colspan='10' class='text-center'>Tidak ada data</td></tr>";
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
							echo "<li><a href='?module=mobiler&hal=1'>&laquo;</a></li>";
						}
						for ($i = $start; $i <= $end; $i++) {
							$aktif = ($i == $hal) ? "class='active'" : "";
							echo "<li $aktif><a href='?module=mobiler&hal=$i'>$i</a></li>";
						}
						if ($hal < $jmlhalaman) {
							echo "<li><a href='?module=mobiler&hal=$jmlhalaman'>&raquo;</a></li>";
						}
						?>
					</ul>
				</div>
			<?php
			break;
		case "tambahmobiler":

		?>
			<section class="content-header">
				<h1 class="text-center">Form Tambah Data Mobiler PKK</h1>
			</section>

			<div class="box box-info" style="margin-top: 20px;">
				<div class="box-header with-border">

				</div><!-- /.box-header -->
				<!-- form start -->

				<form class="form-horizontal" action="<?php echo $aksi; ?>?module=mobiler&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="box-body">

							<div class="form-group">
								<label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
								<div class="col-sm-4">
									<input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="nama_mobiler" class="col-sm-4 control-label">Nama Mobiler<span class="text-danger"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="validate[required] form-control" name="nama_mobiler" id="nama_mobiler" placeholder="Nama Mobiler">
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
								<label for="penerima" class="col-sm-4 control-label">Penerima<span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="validate[required] form-control" name="penerima" id="penerima" placeholder="Penerima">
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
								<label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
								<div class="col-sm-7">
									<select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' readonly>
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

							<div class="form-group">
								<label for="stspengelola" class="col-sm-4 control-label">Status Pengelola<span class="text-danger"> *</span></label>
								<div class="col-sm-6">
									<select class=" validate[required] form-control" name='stspengelola' id='stspengelola'>
										<option value="">Pilih</option>
										<option value="Dikelola PKK">Dikelola PKK</option>
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
									<input type="text" class="form-control" name="waktuentry" id="waktuentry" placeholder="hh:mm:ss" value="<?php echo date('H:i:s'); ?>" readonly>
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
											if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
												$qu = pg_query($koneksi, "SELECT * FROM kelurahan order by nama_kel");
											} else {
												$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
												$qu = pg_query($koneksi, "SELECT * FROM kelurahan where kode='$kodekel' order by nama_kel");
											}
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
							<a type="submit" href="appmaster.php?module=mobiler" name="cmmobiler" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Simpan</button>
						</div><!-- /.box-footer -->
				</form>
			</div>

<?php
	}
}
?>
