<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../../404.php');
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
	include "../../config/koneksi.php";



	$module = $_GET['module'];
	$act    = $_GET['act'];


	// Input Data warung
	if ($module == 'bangunan' and $act == 'input') {


		$insert = "insert into bangunan(tglentry,
								  nama_bangunan,
								  pengelola,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level,
								  stspengelola)
						values('$_POST[tglentry]',
								'$_POST[nama_bangunan]',
								'$_POST[pengelola]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[stspengelola]'
								)";

		$result = pg_query($koneksi, $insert);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

?>

			<script>
				alert('Data Bangunan PKK Berhasil Ditambah');
				window.location.href = '../../appmaster.php?module/bangunan';
			</script>
		<?php

		}

		// Close the connection
		pg_close($koneksi);
	}


	// Update tamanbaca
	elseif ($module == 'bangunan' and $act == 'update') {

		$update = "UPDATE bangunan SET dasawisma= '$_POST[dasawisma]',
									tglentry= '$_POST[tglentry]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									nama_bangunan= '$_POST[nama_bangunan]',
									pengelola= '$_POST[pengelola]',
									stspengelola= '$_POST[stspengelola]'
								
                                WHERE id = '$_POST[id]'";


		$result = pg_query($koneksi, $update);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

		?>
			<script>
				alert('Data Bangunan PKK Berhasil update');
				window.location.href = '../../appmaster.php?module/bangunan';
			</script>
<?php

		}
		// Close the connection
		pg_close($koneksi);
	}
}
?>