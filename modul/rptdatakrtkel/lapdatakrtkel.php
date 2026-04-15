<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$kodekelurahan = $_POST[kdkel];
	$namakelurahan = $_POST[nmkel];
	switch ($act) {
		default:
			$dswisma = pg_query($koneksi, "SELECT * FROM datakrt");
			$count = pg_num_rows($dswisma);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Kepala Rumah Tangga</h2>";

?>
			<form method="post" name="frm">

				<div style="text-align:right">


					<?php
					if ($count > 0) {
					?>

					<?php } ?>

					<div class='box-body' style="text-align:left">
						<div class="box-body table-responsive no-padding">
							<table id='example21' class='table table-bordered table-striped'>
								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup() {
										window.open('modul/rptdatakrtkel/lap_datakrtkel.php?kdkel=<?php echo $kodekelurahan; ?>')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptdatakrtkel/lap_datakrtkel2.php?kdkel=<?php echo $kodekelurahan; ?>')
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
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptdatakrtkel"><i class="fa fa-send"></i> Kembali</a>

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
										<th>No.KRT</th>
										<th>Nama KRT</th>
										<th>Dasawisma</th>
										<th>Lingkungan</th>
										<th>Kelurahan</th>
										<th>Kecamatan</th>
									</tr>
								</thead>


							</table>
						</div>
			</form>
			</div>
			</div>

<?php

	}
}
?>