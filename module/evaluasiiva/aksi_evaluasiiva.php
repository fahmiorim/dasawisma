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

  
  // Input Data evaluasiiva
  if ($module=='evaluasiiva' AND $act=='input'){
      
	  
       $insert = "insert into evaluasiiva(tglentry,
								  kodekec,
								  namakec,
								  userentry,
								  waktuentry,
								  level,
								  tahun,
								  jlhyankes,
								  jlhdokter,
								  jlhbidan,
								  jlhmenikah,
								  jlhreguler,
								  jlhpbi,
								  jlhjamkesda,
								  sblmlounching,
								  jlhtw1,
								  jlhivatw1,
								  jlhtw2,
								  jlhivatw2,
								  jlhtw3,
								  jlhivatw3,
								  jlhtw4,
								  jlhivatw4,
								  jlhrujukrs)
						values('$_POST[tglentry]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[tahun]',
								'$_POST[jlhyankes]',
								'$_POST[jlhdokter]',
								'$_POST[jlhbidan]',
								'$_POST[jlhmenikah]',
								'$_POST[jlhreguler]',
								'$_POST[jlhpbi]',
								'$_POST[jlhjamkesda]',
								'$_POST[sblmlounching]',
								'$_POST[jlhtw1]',
								'$_POST[jlhivatw1]',
								'$_POST[jlhtw2]',
								'$_POST[jlhivatw2]',
								'$_POST[jlhtw3]',
								'$_POST[jlhivatw3]',
								'$_POST[jlhtw4]',
								'$_POST[jlhivatw4]',
								'$_POST[jlhrujukrs]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Evaluasi Pelaksaan Pencegahan dan Deteksi Dini Kanker Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=evaluasiiva';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update evaluasiiva
  elseif ($module=='evaluasiiva' AND $act=='update'){
		
		
      $update= "UPDATE evaluasiiva SET kodekec= '$_POST[kodekec]',
									namakec= '$_POST[namakec]',
									tahun= '$_POST[tahun]',
									jlhyankes= '$_POST[jlhyankes]',
									jlhdokter= '$_POST[jlhdokter]',
									jlhbidan= '$_POST[jlhbidan]',
									jlhmenikah= '$_POST[jlhmenikah]',
									jlhreguler= '$_POST[jlhreguler]',
									jlhpbi= '$_POST[jlhpbi]',
									jlhjamkesda= '$_POST[jlhjamkesda]',
									sblmlounching= '$_POST[sblmlounching]',
									jlhtw1= '$_POST[jlhtw1]',
									jlhivatw1= '$_POST[jlhivatw1]',
									jlhtw2= '$_POST[jlhtw2]',
									jlhivatw2= '$_POST[jlhivatw2]',
									jlhtw3= '$_POST[jlhtw3]',
									jlhivatw3= '$_POST[jlhivatw3]',
									jlhtw4= '$_POST[jlhtw4]',
									jlhivatw4= '$_POST[jlhivatw4]',
									jlhrujukrs= '$_POST[jlhrujukrs]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Evaluasi Pelaksaan Pencegahan dan Deteksi Dini Kanker Berhasil update');
        window.location.href = '../../appmaster.php?module=evaluasiiva';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
