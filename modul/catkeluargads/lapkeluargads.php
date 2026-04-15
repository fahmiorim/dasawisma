<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$datakode = $_POST[kode];
	$datanama_dasawisma = $_POST[nama_dasawisma];
	$datanama_ketua = $_POST[keterangan];

	switch ($act) {
		default:
			$dtwarga = pg_query($koneksi, "SELECT * FROM datawarga ");
			$count = pg_num_rows($dtwarga);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN CATATAN KELUARGA</h2>";

?>
			<form method="post" name="frm">

				<?php
				if ($count > 0) {
				?>

				<?php } ?>

				<div class='box-body' style="text-align:left">
					<div class="box-body table-responsive no-padding">
						<table id='example1' class='table table-bordered table-striped'>
							<script type="text/javascript">
								var s5_taf_parent = window.location;

								<?php
								$tim = pg_query($koneksi, "select * from datakrt where kode='$datakode' and kodekel='$_SESSION[ses_kodekel]' order by id ");
								$i = pg_fetch_array($tim);
								?>

								function popup() {
									window.open('modul/catkeluargads/lap_catkeluargads.php?nokrt=<?php echo "$i[nokrt]"; ?>')
								}
							</script>

							<script type="text/javascript">
								var s5_taf_parent = window.location;

								function popup2() {
									window.open('modul/catkeluargads/lap_catkeluargads2.php?nokrt=<?php echo "$i[nokrt]"; ?>')
								}
							</script>
							<div class="form-group">
								<div class="form-group">
									<label for="kode" class="col-sm-1 control-label">Kode</label>
									<div class="col-sm-2">
										<input type="hidden" id="id" class="form-control" />
										<input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo "$datakode"; ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
									<div class="col-sm-3">
										<input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo "$datanama_dasawisma"; ?>" readonly>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="keterangan" class="col-sm-1 control-label">Nama Ketua</label>
								<div class="col-sm-3">
									<input type="text" class="validate[required] form-control" name="keterangan" id="keterangan" placeholder="Nama Ketua" value="<?php echo "$datanama_ketua"; ?>" readonly>
								</div>
							</div>
					</div>

					<div style="text-align:right">
						<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Catatan Keluarga" href="?module=catkeluargads"><i class="fa fa-send"></i>Catatan Keluarga</a>
					</div>

					<thead>
						<tr>
							<th>

								<input type="checkbox" name="select_all" id="select_all" value="" />
							</th>
							<th>No</th>
							<th>No KRT</th>
							<th>Nama KRT</th>
							<th>Kelurahan</th>
							<th>Kecamatan</th>
							<th>Dasawisma</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;

						$tim = pg_query($koneksi, "select * from datakrt where kode='$datakode' and kodekel='$_SESSION[ses_kodekel]' order by id ");

						while ($tm = pg_fetch_array($tim)) {
						?>
							<tr>
								<td style='text-align:center'>

									<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tm['id']; ?>" />
								</td>
								<td><?php echo " $no"; ?></td>

								<td><?php echo " $tm[nokrt]"; ?></td>
								<td><?php echo " $tm[namakrt]"; ?></td>
								<td><?php echo " $tm[kelurahan]"; ?></td>
								<td><?php echo " $tm[kecamatan]"; ?></td>
								<td><?php echo " $tm[nama_dasawisma]"; ?></td>
								<td>
									<button class="btn bg-orange" title="Save to Excell" onClick="popup2()"><i class="fa fa-print"></i>
										Save to Excell
									</button>
									<a class="btn bg-purple" title="Printer" href="modul/catkeluargads/lap_catkeluargads.php?nokrt=<?php echo "$tm[nokrt]"; ?>" target="blank"><i class="fa fa-print"></i>
										Printer
									</a>
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