<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../404.php'); 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  


  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // Input Data posyandu
  if ($module=='posyandu2' AND $act=='input'){

	    $syarat1 = isset($_POST['cek1']) ? $_POST['cek1'] : '0';
	 $syarat2 = isset($_POST['cek2']) ? $_POST['cek2'] : '0';
	 $syarat3 = isset($_POST['cek3']) ? $_POST['cek3'] : '0';
	 $syarat4 = isset($_POST['cek4']) ? $_POST['cek4'] : '0';
	 $syarat5 = isset($_POST['cek5']) ? $_POST['cek5'] : '0';
	 $syarat6 = isset($_POST['cek6']) ? $_POST['cek6'] : '0';

       $insert = "insert into posyandu(tglentry,
								  namaposyandu,
								  nik,
								  noreg,
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
								  jlhkader,
								  jenis,
								  alamatposyandu,
								  nosklurah,
								  namakader,
								  jadwalbuka,
								  stspaud,
								  stsbkb,
								  stsbaca,
								  ststoga,
								  stsremaja,
								  stslansia,
								  balokskdn,
								  meja,
								  kursi,
								  gantung,
								  berdiri,
								  kepala,
								  ape,
								  lemari,
								  sound,
								  tikar,
								  pojokasi,
								  pmt,
								  seragam,
								  tinggibadan,
								  nohp)
						values('$_POST[tglentry]',
								'$_POST[namaposyandu]',
								'$_POST[nik]',
								'$_POST[noreg]',
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
								'$_POST[jlhkader]',
								'$_POST[jenis]',
								'$_POST[alamatposyandu]',
								'$_POST[nosklurah]',
								'$_POST[namakader]',
								'$_POST[jadwalbuka]',
								'$syarat1',
								'$syarat2',
								'$syarat3',
								'$syarat4',
								'$syarat5',
								'$syarat6',
								'$_POST[balokskdn]',
								'$_POST[meja]',
								'$_POST[kursi]',
								'$_POST[gantung]',
								'$_POST[berdiri]',
								'$_POST[kepala]',
								'$_POST[ape]',
								'$_POST[lemari]',
								'$_POST[sound]',
								'$_POST[tikar]',
								'$_POST[pojokasi]',
								'$_POST[pmt]',
								'$_POST[seragam]',
								'$_POST[tinggibadan]',
								'$_POST[nohp]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Posyandu Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=posyandu2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update posyandu
  elseif ($module=='posyandu2' AND $act=='update'){

	    $syarat1 = isset($_POST['cek1']) ? $_POST['cek1'] : '0';
	 $syarat2 = isset($_POST['cek2']) ? $_POST['cek2'] : '0';
	 $syarat3 = isset($_POST['cek3']) ? $_POST['cek3'] : '0';
	 $syarat4 = isset($_POST['cek4']) ? $_POST['cek4'] : '0';
	 $syarat5 = isset($_POST['cek5']) ? $_POST['cek5'] : '0';
	 $syarat6 = isset($_POST['cek6']) ? $_POST['cek6'] : '0';

      $update= "UPDATE posyandu SET nik = '$_POST[nik]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namaposyandu= '$_POST[namaposyandu]',
									pengelola= '$_POST[pengelola]',
									jlhkader= '$_POST[jlhkader]',
									jenis= '$_POST[jenis]',
									alamatposyandu= '$_POST[alamatposyandu]',
									nosklurah= '$_POST[nosklurah]',
									namakader= '$_POST[namakader]',
									jadwalbuka= '$_POST[jadwalbuka]',
									nohp= '$_POST[nohp]',
									stspaud= '$syarat1',
									stsbkb= '$syarat2',
									stsbaca= '$syarat3',
									ststoga= '$syarat4',
									stsremaja= '$syarat5',
									stslansia= '$syarat6',
									balokskdn= '$_POST[balokskdn]',
									meja= '$_POST[meja]',
									kursi= '$_POST[kursi]',
									gantung= '$_POST[gantung]',
									berdiri= '$_POST[berdiri]',
									kepala= '$_POST[kepala]',
									ape= '$_POST[ape]',
									lemari= '$_POST[lemari]',
									sound= '$_POST[sound]',
									tikar= '$_POST[tikar]',
									pojokasi= '$_POST[pojokasi]',
									tinggibadan= '$_POST[tinggibadan]',
									pmt= '$_POST[pmt]'
									seragam= '$_POST[seragam]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Posyandu Berhasil update');
        window.location.href = '../../appmaster.php?module=posyandu2';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
