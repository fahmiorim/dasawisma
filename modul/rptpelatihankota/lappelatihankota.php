<?php

if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$dswisma = pg_query($koneksi, "SELECT * FROM pelatihan");
			$count = pg_num_rows($dswisma);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Pelatihan Se-Kabupaten Batu Bara</h2>";

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
										window.open('modul/rptpelatihankota/lap_pelatihankota.php')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptpelatihankota/lap_pelatihankota2.php')
									}
								</script>




								<div style="text-align:right">
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptpelatihankota"><i class="fa fa-send"></i> Kembali</a>

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
										<th>Desa/Kelurahan</th>
										<th>Lingkungan</th>
										<th>Dasawisma</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$dasa = pg_query($koneksi, "select * from pelatihan order by lingkungan");

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
											<td><?php echo " $ds[kelurahan]"; ?></td>
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