<?php
$namakec = $_SESSION[ses_namakec];
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$kodekecamatan = $_POST[kdkec];
	$namakecamatan = $_POST[nmkec];
	switch ($act) {
		default:
			$dswisma = pg_query($koneksi, "SELECT * FROM posyandu");
			$count = pg_num_rows($dswisma);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Posyandu Kecamatan $namakec</h2>";

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
										window.open('modul/rptposyandukec/lap_posyandukec.php?kdkec=<?php echo $kodekecamatan; ?>')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptposyandukec/lap_posyandukec2.php?kdkec=<?php echo $kodekecamatan; ?>')
									}
								</script>

								<div class="form-group">
									<label for="kdkelurahan" class="col-sm-1 control-label">Kode</label>

									<div class="col-sm-2">
										<input type="text" class="form-control" id="kdkecamatan" name="kdkecamatan" placeholder="Kode Kecamatan" value="<?php echo "$kodekecamatan"; ?>" readonly>
										<input type="text" class="form-control" id="nmkecamatan" name="nmkecamatan" placeholder="Nama Kecamatan" value="<?php echo "$namakecamatan"; ?>" readonly>

									</div>
								</div>


								<div style="text-align:right">
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptposyandukec"><i class="fa fa-send"></i> Kembali</a>

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
									$no = 1;

									$dasa = pg_query($koneksi, "select * from posyandu where kodekec='$_SESSION[ses_kodekec]' order by lingkungan");

									while ($lk = pg_fetch_array($dasa)) {
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

<?php

	}
}
?>