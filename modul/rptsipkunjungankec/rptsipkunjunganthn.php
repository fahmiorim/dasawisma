<script type="text/javascript">
	$(function() {
		$("#tanggal").datepicker({
			altFormat: 'yy-mm-dd'
		});
		$("#tanggal").change(function() {
			$("#tanggal").datepicker("option", "dateFormat", "yy-mm-dd");
		});
	});
</script>



<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {

	$act = isset($_GET['act']) ? $_GET['act'] : '';
	$tahunsipkunjungan = $_POST[thnkunjungan];
	$idpos = $_POST[idposyandu];
	switch ($act) {
		default:
			$sipkunj = pg_query($koneksi, "SELECT * FROM sipkunjungan where tahun='$_SESSION[thnaktif]' and idposyandu='$idpos'order by tahun desc,nobln");
			$count = pg_num_rows($sipkunj);
			echo "
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN TAHUNAN SIP KUNJUNGAN POSYANDU</h2>";

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
										window.open('modul/rptsipkunjungankec/rptlap_sipkunjunganthn.php?idposyandu=<?php echo $idpos; ?>')
									}
								</script>

								<script type="text/javascript">
									var s5_taf_parent = window.location;

									function popup2() {
										window.open('modul/rptsipkunjungankec/rptlap_sipkunjunganthn2.php?idposyandu=<?php echo $idpos; ?>')
									}
								</script>

								<div class="form-group">
									<label for="tahun" class="col-sm-1 control-label">Tahun</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="thnkunjungan" name="thnkunjungan" placeholder="yyyy" value="<?php echo "$_SESSION[thnaktif]"; ?>" readonly>
									</div>
									<label for="idpos" class="col-sm-1 control-label">ID.Posyandu</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="idpos" name="idpos" value="<?php echo "$idpos"; ?>" readonly>
									</div>
								</div>

								<div style="text-align:right">
									<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptsipkunjungankec"><i class="fa fa-send"></i> Kembali</a>

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
										<th>Bulan</th>
										<th>Tahun</th>
										<th>Nama Posyandu</th>
										<th>Dasawisma</th>
										<th>Lingkungan</th>
										<th>Desa/Kelurahan</th>
										<th>Kecamatan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$tim = pg_query($koneksi, "select * from sipkunjungan where idposyandu='$idpos' and tahun='$_SESSION[thnaktif]' and kodekec='$_SESSION[ses_kodekec]' order by nobln");

									while ($tm = pg_fetch_array($tim)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tm['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $tm[bulan]"; ?></td>
											<td><?php echo " $tm[tahun]"; ?></td>
											<td><?php echo " $tm[namaposyandu]"; ?></td>
											<td><?php echo " $tm[dasawisma]"; ?></td>
											<td><?php echo " $tm[lingkungan]"; ?></td>
											<td><?php echo " $tm[kelurahan]"; ?></td>
											<td><?php echo " $tm[kecamatan]"; ?></td>
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