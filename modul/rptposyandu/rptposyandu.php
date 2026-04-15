<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {


	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$datads = pg_query($koneksi, "select * from posyandu where kodekel='$_SESSION[ses_kodekel]'");
			$count = pg_num_rows($datads);
			echo "
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Profil Posyandu</h2>";
?>
			<form method="post" name="frm">


				<div style="text-align:right">
					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

					<?php
					if ($count > 0) {
					?>


						<div class="form-group">
							<label for="kodekel" class="col-sm-1 control-label">Desa/Kelurahan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kdkel" name="kdkel" placeholder="Kode Kelurahan" value="<?php echo "$_SESSION[ses_kodekel]"; ?>">
								<input type="text" class="form-control" id="nmkel" name="nmkel" placeholder="Nama Kelurahan" value="<?php echo "$_SESSION[ses_namakel]"; ?>">
							</div>
						</div>
						<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan" onClick="print_records_rptposyandukel();"><i class="fa fa-print"></i> Print Per Desa/Kelurahan</button>


					<?php } ?>


					<div class='box-body'>

						<div class="box-body table-responsive no-padding">
							<table id='example25' class='table table-bordered table-striped'>


								<thead>
									<tr>
										<th>
											<input type="checkbox" name="select_all" id="select_all" value="" />
										</th>
										<th>No</th>
										<th>Nama Posyandu</th>
										<th>Alamat Posyandu</th>
										<th>No.SK Lurah</th>
										<th>Jlh Kader</th>
										<th>Strata Posyandu</th>
										<th>Nama Kader</th>
										<th>Dasawisma</th>
										<th>Lingkungan</th>
										<th>Balok SKDN</th>
										<th>Meja</th>
										<th>Kursi</th>
										<th>Timbangan Gantung</th>
										<th>Timbangan Berdiri</th>
										<th>Pengukur Lingkar Kepala</th>
										<th>Alat Permainan Edukasi (APE)</th>
										<th>Lemari</th>
										<th>Sound System</th>
										<th>Tikar</th>
										<th>Pojok Asi</th>
										<th>PMT</th>
										<th>Seragam Kader Posyandu</th>
										<th>Pengukur Tinggi Badan</th>
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