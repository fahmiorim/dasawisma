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
	if ($module == 'mesin' and $act == 'input') {


		$insert = "insert into mesin(tglentry,
								  nama_mesin,
								  penerima,
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
								'$_POST[nama_mesin]',
								'$_POST[penerima]',
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
				alert('Data Mesin PKK Berhasil Ditambah');
				window.location.href = '../../appmaster.php?module/mesin';
			</script>
		<?php

		}

		// Close the connection
		pg_close($koneksi);
	}


	// Update tamanbaca
	elseif ($module == 'mesin' and $act == 'update') {

		$update = "UPDATE mesin SET dasawisma= '$_POST[dasawisma]',
									tglentry= '$_POST[tglentry]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									nama_mesin= '$_POST[nama_mesin]',
									penerima= '$_POST[penerima]',
									stspengelola= '$_POST[stspengelola]'
								
                                WHERE id = '$_POST[id]'";


		$result = pg_query($koneksi, $update);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

		?>
			<script>
				alert('Data Mesin PKK Berhasil update');
				window.location.href = '../../appmaster.php?module/mesin';
			</script>
<?php

		}
		// Close the connection
		pg_close($koneksi);
	}
}
?>