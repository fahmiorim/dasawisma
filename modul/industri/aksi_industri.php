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

  
  // Input Data industri
  if ($module=='industri' AND $act=='input'){
      
	  
       $insert = "insert into industri(nokk,
								  noreg,
								  dasawisma,
								  lingkungan,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  namakk,
								  kategori,
								  komoditi,
								  jumlah,
								  tglentry,
								  userentry,
								  waktuentry,
								  level,
								  satuan) 
						values('$_POST[nokk]',
								'$_POST[noreg]',
								'$_POST[dasawisma]',
								'$_POST[nama_lingkungan]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[namakk]',
								'$_POST[kategori]',
								'$_POST[komoditi]',
								'$_POST[jumlah]',
								'$_POST[tglentry]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[satuan]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Industri Rumah Tangga Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=industri';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update industri
  elseif ($module=='industri' AND $act=='update'){
		 
      $update= "UPDATE industri SET nokk = '$_POST[nokk]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namakk= '$_POST[namakk]',
									kategori= '$_POST[kategori]',
									komoditi= '$_POST[komoditi]',
									jumlah= '$_POST[jumlah]',
									satuan='$_POST[satuan]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Industri Rumah Tangga Berhasil update');
        window.location.href = '../../appmaster.php?module=industri';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
