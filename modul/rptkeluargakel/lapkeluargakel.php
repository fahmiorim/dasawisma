<?php
$namakel = $_SESSION[ses_namakel];
?>
<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$kodekelurahan = $_POST[kdkel];
	$namakelurahan = $_POST[nmkel];
	switch ($act) {
		default:
			$dswisma = pg_query($koneksi, "SELECT * FROM keluarga");
			$count = pg_num_rows($dswisma);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Catatan Keluarga Desa/Kelurahan $namakel</h2>";

?>
			<form method="post" name="frm">

				<div style="text-align:right">


					<?php
					if ($count > 0) {
					?>

					<?php } ?>

					<div class='box-body' style="text-align:left">
						<div class="box-body table-responsive no-padding">
							<table id='example1' class='table table-bordered table-striped'>
								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup() {
										window.open('modul/rptkeluargakel/lap_keluargakel.php?kdkel=<?php echo $kodekelurahan; ?>')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptkeluargakel/lap_keluargakel2.php?kdkel=<?php echo $kodekelurahan; ?>')
									}
								</script>

								<div class="form-group">
									<label for="kdkelurahan" class="col-sm-1 control-label">Kode</label>

									<div class="col-sm-2">
										<input type="text" class="form-control" id="kdkelurahan" name="kdkelurahan" placeholder="Kode Kelurahan" value="<?php echo "$kodekelurahan"; ?>" readonly>
										<input type="text" class="form-control" id="nmkelurahan" name="nmkelurahan" placeholder="Nama Kelurahan" value="<?php echo "$namakelurahan"; ?>" readonly>

									</div>
								</div>
								<br>


								<div style="text-align:right">
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptkeluargakel"><i class="fa fa-send"></i> Kembali</a>

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
										<th>Kepala Keluarga</th>
										<th>Jlh KK</th>
										<th>Anggota Kel</th>
										<th>Balita</th>
										<th>PUS</th>
										<th>WUS</th>
										<th>Bumil</th>
										<th>Menyusui</th>
										<th>Lansia</th>
										<th>3 Buta</th>
										<th>Kriteria Rumah</th>
										<th>Sumber Air</th>
										<th>Makanan Pokok</th>
										<th>Lingkungan</th>
										<th>Dasawisma</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$dasa = pg_query($koneksi, "select * from keluarga where kodekel='$_SESSION[ses_kodekel]' order by lingkungan");

									while ($ds = pg_fetch_array($dasa)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $ds[namakk]"; ?></td>
											<td><?php echo " $ds[jlhkk]"; ?></td>
											<td><?php echo " $ds[anggotakel]"; ?></td>
											<td><?php echo " $ds[balita]"; ?></td>
											<td><?php echo " $ds[pus]"; ?></td>
											<td><?php echo " $ds[wus]"; ?></td>
											<td><?php echo " $ds[bumil]"; ?></td>
											<td><?php echo " $ds[ibumenyusui]"; ?></td>
											<td><?php echo " $ds[lansia]"; ?></td>
											<td><?php echo " $ds[buta3]"; ?></td>
											<td><?php echo " $ds[rumah]"; ?></td>
											<td><?php echo " $ds[sumberair]"; ?></td>
											<td><?php echo " $ds[makanan]"; ?></td>
											<td><?php echo " $ds[lingkungan]"; ?></td>
											<td><?php echo " $ds[dasawisma]"; ?></td>
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

	}
}
?>