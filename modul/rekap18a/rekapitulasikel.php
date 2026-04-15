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
			$datads = pg_query($koneksi, "select * from ibubayi where kodekel='$_SESSION[ses_kodekel]'");
			$count = pg_num_rows($datads);
			echo "
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Rekapitulasi Data Ibu/Bayi/Balita $namakel</h2>";
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
						<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Rekapitulasi" onClick="print_records_rekap18a();"><i class="fa fa-print"></i> Print Rekapitulasi</button>


					<?php } ?>


					<div class='box-body'>

						<div class="box-body table-responsive no-padding">
							<table id='example1' class='table table-bordered table-striped'>


								<thead>
									<tr>
										<th>
											<input type="checkbox" name="select_all" id="select_all" value="" />
										</th>
										<th>No</th>
										<th>Tahun</th>
										<th>Bulan</th>
										<th>TglMelahirkan</th>
										<th>NIK</th>
										<th>Nama Ibu</th>
										<th>Nama Suami</th>
										<th>Nama Bayi</th>
										<th>Jenis Kelamin</th>
										<th>Status Ibu</th>
										<th>Akte Lahir</th>
										<th>Dasawisma</th>
										<th>Lingkungan</th>
										<th>Kelurahan</th>
										<th>Kecamatan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$dasa = pg_query($koneksi, "select * from ibubayi where kodekel='$_SESSION[ses_kodekel]' order by namaibu");
									while ($ds = pg_fetch_array($dasa)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $ds[tahun]"; ?></td>
											<td><?php echo " $ds[bulan]"; ?></td>
											<td><?php echo " $ds[tglmelahirkan]"; ?></td>
											<td><?php echo " $ds[nik]"; ?></td>
											<td><?php echo " $ds[namaibu]"; ?></td>
											<td><?php echo " $ds[namasuami]"; ?></td>
											<td><?php echo " $ds[namabayi]"; ?></td>
											<td><?php echo " $ds[jenkel]"; ?></td>
											<td><?php echo " $ds[statusibu]"; ?></td>
											<td><?php echo " $ds[akte]"; ?></td>
											<td><?php echo " $ds[dasawisma]"; ?></td>
											<td><?php echo " $ds[lingkungan]"; ?></td>
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
			</div>
			</div>



<?php

	}
}
?>