<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$kodekelurahan = $_POST[kdkel];
	$namakelurahan = $_POST[nmkel];
	switch ($act) {
		default:
			$dswisma = pg_query($koneksi, "SELECT * FROM pelatihan");
			$count = pg_num_rows($dswisma);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Pelatihan</h2>";

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
										window.open('modul/rptpelatihankel/lap_pelatihankel.php?kdkel=<?php echo $kodekelurahan; ?>')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptpelatihankel/lap_pelatihankel2.php?kdkel=<?php echo $kodekelurahan; ?>')
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
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptpelatihankel"><i class="fa fa-send"></i> Kembali</a>

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
										<th>No.Reg</th>
										<th>NIK</th>
										<th>Nama Warga</th>
										<th>Nama Pelatihan</th>
										<th>Kriteria</th>
										<th>Penyelenggara</th>
										<th>Tahun</th>
										<th>Lingkungan</th>
										<th>Dasawisma</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$dasa = pg_query($koneksi, "select * from pelatihan where kodekel='$_SESSION[ses_kodekel]' order by lingkungan");

									while ($ds = pg_fetch_array($dasa)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $ds[noreg]"; ?></td>
											<td><?php echo " $ds[nik]"; ?></td>
											<td><?php echo " $ds[nama]"; ?></td>
											<td><?php echo " $ds[namapelatihan]"; ?></td>
											<td><?php echo " $ds[kriteria]"; ?></td>
											<td><?php echo " $ds[penyelenggara]"; ?></td>
											<td><?php echo " $ds[tahun]"; ?></td>
											<td><?php echo " $ds[lingkungan]"; ?></td>
											<td><?php echo " $ds[dasawisma]"; ?></td>
											<td><?php echo " $ds[keterangan]"; ?></td>
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