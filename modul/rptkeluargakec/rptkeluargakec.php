<?php
$namakec = $_SESSION['ses_namakec'];
?>
<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {


	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$datads = pg_query($koneksi, "select * from keluarga where kodekec='".$_SESSION['ses_kodekec']."'");

			$count = pg_num_rows($datads);

			// Pagination
			$limit = 10;
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			if($page < 1) $page = 1;
			$offset = ($page - 1) * $limit;
			$total_pages = ceil($count / $limit);
			echo "
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Catatan Keluarga Per Desa/Kelurahan Kecamatan $namakec</h2>";
?>
			<form method="post" name="frm">


				<div style="text-align:right">
					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

					<?php
					if ($count > 0) {
					?>


						<div class="form-group">
							<label for="kodekel" class="col-sm-1 control-label">Kecamatan</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kdkec" name="kdkec" placeholder="Kode Kecamatan" value="<?php echo $_SESSION['ses_kodekec']; ?>" readonly>
								<input type="text" class="form-control" id="nmkec" name="nmkec" placeholder="Nama Kecamatan" value="<?php echo $_SESSION['ses_namakec']; ?>" readonly>
							</div>
						</div>
						<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan" onClick="print_records_rptkeluargakec();"><i class="fa fa-print"></i> Print Per Kecamatan</button>


					<?php } ?>


					<div class='box-body'>

						<div class="box-body table-responsive no-padding">
							<table id='table-rptkeluargakec' class='table table-bordered table-striped'>


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
							$no = $offset + 1;

							$dasa = pg_query($koneksi, "select * from keluarga where kodekec='".$_SESSION['ses_kodekec']."' order by lingkungan,dasawisma LIMIT $limit OFFSET $offset");
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

				<!-- Pagination -->
				<div class='box-footer clearfix'>
					<ul class='pagination pagination-sm no-margin pull-right'>
						<?php
						$batas_halaman = 5;
						$start = max(1, $page - floor($batas_halaman/2));
						$end = min($total_pages, $start + $batas_halaman - 1);
						if($end - $start < $batas_halaman - 1){
							$start = max(1, $end - $batas_halaman + 1);
						}
						if($page > 1){
							$prev = $page - 1;
							echo "<li><a href=\"?module=rptkeluargakec&page=1\">&laquo;</a></li>";
							echo "<li><a href=\"?module=rptkeluargakec&page=$prev\">&lsaquo;</a></li>";
						}
						for($i=$start; $i<=$end; $i++){
							$aktif = ($i == $page) ? "class=\"active\"" : "";
							echo "<li $aktif><a href=\"?module=rptkeluargakec&page=$i\">$i</a></li>";
						}
						if($page < $total_pages){
							$next = $page + 1;
							echo "<li><a href=\"?module=rptkeluargakec&page=$next\">&rsaquo;</a></li>";
							echo "<li><a href=\"?module=rptkeluargakec&page=$total_pages\">&raquo;</a></li>";
						}
						?>
					</ul>
					<p>Total: <?php echo $count; ?> records</p>
				</div>
			</div>

<?php

	}
}
?>