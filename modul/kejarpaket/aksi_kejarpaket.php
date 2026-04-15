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

  
  // Input Data Kejar Paket
  if ($module=='kejarpaket' AND $act=='input'){
      
       $insert = "insert into kejarpaket(tglentry,
								  namapaket,
								  jenis,
								  waberlk,
								  waberpr,
								  pengajarlk,
								  pengajarpr,
								  stspengelola,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level)
						values('$_POST[tglentry]',
								'$_POST[namapaket]',
								'$_POST[jenis]',
								'$_POST[waberlk]',
								'$_POST[waberpr]',
								'$_POST[pengajarlk]',
								'$_POST[pengajarpr]',
								'$_POST[stspengelola]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kejar Paket/KF/PAUD Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=kejarpaket';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update kejarpaket
  elseif ($module=='kejarpaket' AND $act=='update'){
		 
      $update= "UPDATE kejarpaket SET namapaket = '$_POST[namapaket]',
									jenis= '$_POST[jenis]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									waberlk= '$_POST[waberlk]',
									waberpr= '$_POST[waberpr]',
									pengajarlk= '$_POST[pengajarlk]',
									pengajarpr= '$_POST[pengajarpr]',
									stspengelola= '$_POST[stspengelola]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Kejar Paket/KF/PAUD Berhasil update');
        window.location.href = '../../appmaster.php?module=kejarpaket';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
