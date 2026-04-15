<?php
$namakel = $_SESSION[ses_namakel];
?>
<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {


	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$datads = pg_query($koneksi, "select * from datakrt where kodekel='$_SESSION[ses_kodekel]'");
			$count = pg_num_rows($datads);
			echo "
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Kepala Rumah Tangga $namakel</h2>";
?>
			<form method="post" name="frm">


				<div style="text-align:right">
					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

					<?php
					if ($count > 0) {
					?>


						<div class="form-group">
							<label for="kodekel" class="col-sm-2 control-label">Desa/Kelurahan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kdkel" name="kdkel" placeholder="Kode Kelurahan" value="<?php echo "$_SESSION[ses_kodekel]"; ?>" readonly>
								<input type="text" class="form-control" id="nmkel" name="nmkel" placeholder="Nama Kelurahan" value="<?php echo "$_SESSION[ses_namakel]"; ?>" readonly>
							</div>
						</div>
						<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan" onClick="print_records_rptdatakrtkel();"><i class="fa fa-print"></i> Cetak</button>


					<?php } ?>
					</div>

					<div class='box-body'>

						<div class="box-body table-responsive no-padding">
							<table id='example21' class='table table-bordered table-striped'>


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