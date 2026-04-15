<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:404.php');
} else {


	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
		default:
			$warung = pg_query($koneksi, "select * from warung where kodekel='$_SESSION[ses_kodekel]'");
			$count = pg_num_rows($warung);
			echo "
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Warung PKK Per Desa/Kelurahan</h2>";
?>
			<form method="post" name="frm">


				<div style="text-align:right">
					<a class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>

					<div class="form-group">
						<div class="form-group">
							<label for="kodekel" class="col-sm-1 control-label">Kode</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="kdkel" name="kdkel" placeholder="Kode Kelurahan" value="<?php echo "$_SESSION[ses_kodekel]"; ?>">

							</div>
						</div>

						<div class="form-group">
							<label for="nmkel" class="col-sm-1 control-label">Nama</label>
							<div class="col-sm-4">

								<input type="text" class="form-control" id="nmkel" name="nmkel" placeholder="Nama Kelurahan" value="<?php echo "$_SESSION[ses_namakel]"; ?>">
							</div>
						</div>
					</div>
					<button class="btn bg-purple btn-flat margin" data-toggle="tooltip" data-placement="top" title="Print Warung PKK" onClick="print_records_rptwarungkel();"><i class="fa fa-print"></i> Print Warung PKK</button>




					<?php
					if ($count > 0) {
					?>






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
										<th>Nama Warung</th>
										<th>Lingkungan</th>
										<th>Nama Dasawisma</th>
										<th>Pengelola</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;

									$dasa = pg_query($koneksi, "select * from warung where kodekel='$_SESSION[ses_kodekel]' order by lingkungan");
									while ($ds = pg_fetch_array($dasa)) {
									?>
										<tr>
											<td style='text-align:center'>

												<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id']; ?>" />
											</td>
											<td><?php echo " $no"; ?></td>
											<td><?php echo " $ds[namawarung]"; ?></td>
											<td><?php echo " $ds[lingkungan]"; ?></td>
											<td><?php echo " $ds[dasawisma]"; ?></td>
											<td><?php echo " $ds[pengelola]"; ?></td>
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