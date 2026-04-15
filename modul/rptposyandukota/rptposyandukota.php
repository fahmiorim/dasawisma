<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {


	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$datads = pg_query($koneksi, "select * from posyandu order by kelurahan");
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
                  <h2 class='box-title'>Cetak Laporan Profil Posyandu</h2>";
?>
			<form method="post" name="frm">


				<div style="text-align:right">
					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

					<?php
					if ($count > 0) {
					?>



						<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print" onClick="print_records_rptposyandukota();"><i class="fa fa-print"></i> Print</button>


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
										<th>Tgl.Entry</th>
										<th>Id.Posyandu</th>
										<th>Nama Posyandu</th>
										<th>Alamat Posyandu</th>
										<th>Jlh Kader</th>
										<th>Jenis Posyandu</th>
										<th>Dasawisma</th>
										<th>Lingkungan</th>
										<th>Desa/Kelurahan</th>
										<th>Kecamatan</th>
										<th>PAUD</th>
										<th>BKB</th>
										<th>Sudut Baca</th>
										<th>Toga</th>
										<th>Posyandu Remaja</th>
										<th>Posyandu Lansia</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = $offset + 1;

									$lingk = pg_query($koneksi, "select * from posyandu order by namaposyandu LIMIT $limit OFFSET $offset");
									while ($lk = pg_fetch_array($lingk)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $lk[tglentry]"; ?></td>
											<td><?php echo " $lk[idposyandu]"; ?></td>
											<td><?php echo " $lk[namaposyandu]"; ?></td>
											<td><?php echo " $lk[alamatposyandu]"; ?></td>
											<td><?php echo " $lk[jlhkader]"; ?></td>
											<td><?php echo " $lk[jenis]"; ?></td>
											<td><?php echo " $lk[dasawisma]"; ?></td>
											<td><?php echo " $lk[lingkungan]"; ?></td>
											<td><?php echo " $lk[kelurahan]"; ?></td>
											<td><?php echo " $lk[kecamatan]"; ?></td>
											<td align="center"><?php
																$cek11 = $lk['stspaud'];
																if ($cek11 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>

											<td align="center"><?php
																$cek12 = $lk['stsbkb'];
																if ($cek12 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>

											<td align="center"><?php
																$cek13 = $lk['stsbaca'];
																if ($cek13 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>

											<td align="center"><?php
																$cek14 = $lk['ststoga'];
																if ($cek14 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>

											<td align="center"><?php
																$cek15 = $lk['stsremaja'];
																if ($cek15 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>

											<td align="center"><?php
																$cek16 = $lk['stslansia'];
																if ($cek16 == '1') {
																?>
													<i class="fa fa-check"></i>
												<?php } else { ?>
													<i class="fa fa-minus"></i>
												<?php } ?>
											</td>
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
						echo "<li><a href=\"?module=rptposyandukota&page=1\">&laquo;</a></li>";
						echo "<li><a href=\"?module=rptposyandukota&page=$prev\">&lsaquo;</a></li>";
					}
					for($i=$start; $i<=$end; $i++){
						$aktif = ($i == $page) ? "class=\"active\"" : "";
						echo "<li $aktif><a href=\"?module=rptposyandukota&page=$i\">$i</a></li>";
					}
					if($page < $total_pages){
						$next = $page + 1;
						echo "<li><a href=\"?module=rptposyandukota&page=$next\">&rsaquo;</a></li>";
						echo "<li><a href=\"?module=rptposyandukota&page=$total_pages\">&raquo;</a></li>";
					}
					?>
				</ul>
				<p>Total: <?php echo $count; ?> records</p>
			</div>

<?php

	}
}
?>