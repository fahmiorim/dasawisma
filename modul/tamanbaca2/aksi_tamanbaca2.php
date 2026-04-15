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

  
  // Input Data warung
  if ($module=='tamanbaca2' AND $act=='input'){
      
	  
       $insert = "insert into tamanbaca(tglentry,
								  namatamanbaca,
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
								  jlhbuku,
								  stspengelola)
						values('$_POST[tglentry]',
								'$_POST[namatamanbaca]',
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
								'$_POST[jlhbuku]',
								'$_POST[stspengelola]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Taman Bacaan PKK Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=tamanbaca2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update tamanbaca
  elseif ($module=='tamanbaca2' AND $act=='update'){
		 
      $update= "UPDATE tamanbaca SET dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namatamanbaca= '$_POST[namatamanbaca]',
									pengelola= '$_POST[pengelola]',
									stspengelola= '$_POST[stspengelola]',
									jlhbuku= '$_POST[jlhbuku]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Taman Bacaan PKK Berhasil update');
        window.location.href = '../../appmaster.php?module=tamanbaca2';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
