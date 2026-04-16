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


	// Input Data KRT
	if ($module == 'bantuan' and $act == 'input') {

	 $bantuan1=$_POST[cek1];
	 $bantuan2=$_POST[cek2];
	 $bantuan3=$_POST[cek3];
	 $bantuan4=$_POST[cek4];
	 $bantuan5=$_POST[cek5];
	 $bantuan6=$_POST[cek6];
	 $bantuan7=$_POST[cek7];
	 $bantuan8=$_POST[cek8];
	 $bantuan9=$_POST[cek9];
	 $bantuan10=$_POST[cek10];

		$ceknokk = $_POST[nokk];

		$insert = "insert into bantuan (tglentry,
									nokk,
									nik,
									nama,
									kode,
									nama_dasawisma,
									kodekel,
									kelurahan,
									kodekec,
									kecamatan,
									lingkungan,
									penerima_bantuan,
									dtks,
									nondtks,
									pbnt,
									jps_provinsi,
									blt_dd,
									pkh,
									bst,
									pmks,
									pbi,
									lainnya
									)
							values(
								   '$_POST[tglentry]',
								   '$_POST[nokk]',
								   '$_POST[nik]',
								   '$_POST[nama]',
								   '$_POST[kode]',
								   '$_POST[nama_dasawisma]',
								   '$_POST[kodekel]',
								   '$_POST[kelurahan]',
								   '$_POST[kodekec]',
								   '$_POST[kecamatan]',
								   '$_POST[lingkungan]',
								   '$_POST[penerima_bantuan]',
								   '$bantuan1',
								   '$bantuan2',
								   '$bantuan3',
								   '$bantuan4',
								   '$bantuan5',
								   '$bantuan6',
								   '$bantuan7',
								   '$bantuan8',
								   '$bantuan9',
								   '$bantuan10'

								   )";

	$query = pg_query($koneksi, "SELECT * FROM bantuan WHERE nokk='$ceknokk'");
	$cek = pg_num_rows($query);

   if($cek > 0){

	?>

	   <script>
        alert('No KK sudah terdata');
        window.location.href = '../../appmaster.php?module=bantuan';
    </script>

<?php

 } else {

		$result = pg_query($koneksi, $insert);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

?>

			<script>
				alert('Data Bantuan Keluarga Berhasil Tambah');
				window.location.href = '../../appmaster.php?module=bantuan';
			</script>
		<?php

		}
		}


		// Close the connection
		pg_close($koneksi);
	}


	// Update bantuan
	elseif ($module == 'bantuan' and $act == 'update') {


		$update = "UPDATE bantuan SET tglentry = '$_POST[tglentry]',
								    nokk = '$_POST[nokk]',
									nik = '$_POST[nik]',
									nama = '$_POST[nama]',
									kode = '$_POST[kode]',
									nama_dasawisma = '$_POST[nama_dasawisma]',
									kodekel = '$_POST[kodekel]',
									kelurahan = '$_POST[kelurahan]',
									kodekec = '$_POST[kodekec]',
									kecamatan = '$_POST[kecamatan]',
									lingkungan = '$_POST[lingkungan]',
									penerima_bantuan = '$_POST[penerima_bantuan]',
									dtks = '$_POST[cek1]',
									nondtks = '$_POST[cek2]',
									pbnt = '$_POST[cek3]',
									jps_provinsi = '$_POST[cek4]',
									blt_dd = '$_POST[cek5]',
									pkh = '$_POST[cek6]',
									bst = '$_POST[cek7]',
									pmks = '$_POST[cek8]',
									pbi = '$_POST[cek9]',
									lainnya = '$_POST[cek10]'
                                    WHERE id = '$_POST[id]'";


		$result = pg_query($koneksi, $update);

		if (!$result) {
			echo pg_last_error($koneksi);
		} else {

		?>

			<script>
				alert('Data Bantuan Keluarga Berhasil update');
				window.location.href = '../../appmaster.php?module=bantuan';
			</script>
<?php

		}

		// Close the connection
		pg_close($koneksi);
	}
}
?>