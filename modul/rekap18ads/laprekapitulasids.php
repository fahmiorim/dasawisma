<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$datakode = $_POST[kode];
	$datanama_dasawisma = $_POST[nama_dasawisma];
	$datanama_ketua = $_POST[keterangan];

	switch ($act) {
		default:
			$dtwarga = pg_query($koneksi, "SELECT * FROM ibubayi ");
			$count = pg_num_rows($dtwarga);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>REKAPITULASI PER-DASAWISMA</h2>";

?>
			<form method="post" name="frm">

				<?php
				if ($count > 0) {
				?>

				<?php } ?>

				<div class='box-body' style="text-align:left">
					<div class="box-body table-responsive no-padding">
						<table id='example1' class='table table-bordered table-striped'>
							<script type="text/javascript">
								var s5_taf_parent = window.location;


								<?php
								$tim = pg_query($koneksi, "select * from ibubayi where kode='$datakode' and kodekel='$_SESSION[ses_kodekel]' order by id");
								$i = pg_fetch_array($tim);
								?>

								function popup() {
									window.open('modul/rekap18ads/lap_rekapitulasids.php?dsm=<?php echo "$i[kode]"; ?>')
								}
							</script>

							<script type="text/javascript">
								var s5_taf_parent = window.location;

								function popup2() {
									window.open('modul/rekap18ads/lap_rekapitulasids2.php?dsm=<?php echo "$i[kode]"; ?>')
								}
							</script>
							<div class="form-group">
								<div class="form-group">
									<label for="kode" class="col-sm-1 control-label">Kode</label>
									<div class="col-sm-2">
										<input type="hidden" id="id" class="form-control" />
										<input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo "$datakode"; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
									<div class="col-sm-3">
										<input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo "$datanama_dasawisma"; ?>" readonly>
									</div>
								</div>


								<div class="form-group">
									<label for="keterangan" class="col-sm-1 control-label">Nama Ketua</label>
									<div class="col-sm-3">
										<input type="text" class="validate[required] form-control" name="keterangan" id="keterangan" placeholder="Nama Ketua" value="<?php echo "$datanama_ketua"; ?>" readonly>
									</div>
								</div>
							</div>


							<div style="text-align:right">
								<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Catatan Keluarga" href="?module=rekap18ads"><i class="fa fa-send"></i> Rekapitulasi</a>

								<button class="btn bg-orange btn-flat margin" title="Save to Excell" onClick="popup2()"><i class="fa fa-print"></i>
									Save to Excell
								</button>

								<button class="btn bg-purple btn-flat margin" title="Printer" onClick="popup()"><i class="fa fa-print"></i>
									Printer
								</button>
							</div>

							<thead>
								<tr>
									<th>
										<input type="checkbox" name="select_all" id="select_all" value="" />
									</th>
									<th>No</th>
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
									<th>Kode</th>
									<th>Desa/Kelurahan</th>
									<th>Kecamatan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;

								$dasa = pg_query($koneksi, "select * from ibubayi where dasawisma='$datanama_dasawisma' and kodekel='$_SESSION[ses_kodekel]' order by id");

								while ($ds = pg_fetch_array($dasa)) {
								?>
									<tr>
										<td style='text-align:center'>

											<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id']; ?>" />
										</td>
										<td><?php echo " $no"; ?></td>
										<td><?php echo " $ds[tahun]"; ?></td>
										<td><?php echo " $ds[bulan]"; ?></td>
										<td><?php echo " $ds[nik]"; ?></td>
										<td><?php echo " $ds[namaibu]"; ?></td>
										<td><?php echo " $ds[namasuami]"; ?></td>
										<td><?php echo " $ds[namabayi]"; ?></td>
										<td><?php echo " $ds[jenkel]"; ?></td>
										<td><?php echo " $ds[statusibu]"; ?></td>
										<td><?php echo " $ds[akte]"; ?></td>
										<td><?php echo " $ds[dasawisma]"; ?></td>
										<td><?php echo " $ds[lingkungan]"; ?></td>
										<td><?php echo " $ds[kode]"; ?></td>
										<td><?php echo " $ds[kelurahan]"; ?></td>
										<td><?php echo " $ds[kecamatan]"; ?></td>
									</tr>
								<?php
									$no++;
								}
								?>
							</tbody>

						</table>
					</div>
			</form>

<?php

	}
}
?>