<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
	include "../../config/koneksi.php";



	$module = $_GET['module'];
	$act    = $_GET['act'];


	// Input Data melahirkan
	if ($module == 'ibubayi' and $act == 'input') {


		$insert = "insert into ibubayi(tglentry,
								  tglmelahirkan,
								  namaibu,
								  namasuami,
								  namabayi,
								  akte,
								  jenkel,
								  userentry,
								  waktuentry,
								  level,
								  bulan,
								  tahun,
								  statusibu,
								  nik,
								  noreg,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  kode,
								  dasawisma,
								  namabayik,
								  statusibuk,
								  jenkelk,
								  tglmeninggal,
								  sebabmeninggal,
								  keterangan) 
						values('$_POST[tglentry]',
								'$_POST[tglmelahirkan]',
								'$_POST[namaibu]',
								'$_POST[namasuami]',
								'$_POST[namabayi]',
								'$_POST[akte]',
								'$_POST[jenkel]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[statusibu]',
								'$_POST[nik]',
								'$_POST[noreg]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[kode]',
								'$_POST[dasawisma]',
								'$_POST[namabayik]',
								'$_POST[statusibuk]',
								'$_POST[jenkelk]',
								'$_POST[tglmeninggal]',
								'$_POST[sebabmeninggal]',
								'$_POST[keterangan]'
								)";

		$result = pg_query($koneksi, $insert);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

?>

			<script>
				alert('Data Ibu/Balita/Bayi Berhasil Ditambah');
				window.location.href = '../../appmaster.php?module=ibubayi';
			</script>
		<?php

		}

		// Close the connection
		pg_close($koneksi);
	}


	// Update melahirkan
	elseif ($module == 'ibubayi' and $act == 'update') {

		$update = "UPDATE ibubayi SET 
									tglentry = '$_POST[tglentry]',
									nik = '$_POST[nik]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namaibu= '$_POST[namaibu]',
									namasuami= '$_POST[namasuami]',
									akte= '$_POST[akte]',
									tglmelahirkan= '$_POST[tglmelahirkan]',
									namabayi= '$_POST[namabayi]',
									jenkel= '$_POST[jenkel]',
									statusibu= '$_POST[statusibu]',
									bulan= '$_POST[bulan]',
									tahun= '$_POST[tahun]',
									statusibuk= '$_POST[statusibuk]',
									jenkelk= '$_POST[jenkelk]',
									tglmeninggal= '$_POST[tglmeninggal]',
									sebabmeninggal= '$_POST[sebabmeninggal]',
									keterangan= '$_POST[keterangan]',
									namabayik= '$_POST[namabayik]'
                                WHERE id = '$_POST[id]'";


		$result = pg_query($koneksi, $update);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

		?>
			<script>
				alert('Data Ibu/Balita/Bayi Berhasil update');
				window.location.href = '../../appmaster.php?module=ibubayi';
			</script>
<?php

		}
		// Close the connection
		pg_close($koneksi);
	}
}
?>