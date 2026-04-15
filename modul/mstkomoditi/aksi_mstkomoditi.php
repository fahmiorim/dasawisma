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

  
  // Input Data Jenis mstkomoditi
  if ($module=='mstkomoditi' AND $act=='input'){
       
	  
     $insert = "insert into mstkomoditi (nama_komoditi,jenis_komoditi)  
							values('$_POST[nama_komoditi]',
							'$_POST[jenis_komoditi]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jenis Komoditi Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=mstkomoditi';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update mstkomoditi
  elseif ($module=='mstkomoditi' AND $act=='update'){
    
   
      $update= "UPDATE mstkomoditi SET jenis_komoditi = '$_POST[jenis_komoditi]',
										nama_komoditi = '$_POST[nama_komoditi]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jenis Komoditi Berhasil update');
        window.location.href = '../../appmaster.php?module=mstkomoditi';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
