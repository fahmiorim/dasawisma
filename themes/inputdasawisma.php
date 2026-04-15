 <?php
	error_reporting(0);
	session_start();
	if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
		header('location:../index.php');
	}
	// 
	else {

	?>

 	<?php
		include "../config/koneksi.php";
		include "../config/library.php";



		// $tot01 = pg_query($koneksi, "select count(kodekec) as totalds from datakrt where kodekec='01'");
		// $jlh01 = pg_fetch_array($tot01);
		// $jumlah01 = $jlh01[totalds];

		// $totds = pg_query($koneksi, "select count(kodekec) as totalds from datakrt where kodekec='02'");
		// $jlhds = pg_fetch_array($totds);
		// $jumlahds = $jlhds[totalds];

		// $data[0] = $jumlah01;
		// $data[1] = $jumlahds;

		// echo json_encode($data);
		?>

 <?php } ?>