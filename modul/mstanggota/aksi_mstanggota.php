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

  
  // Input Status Anggota
  if ($module=='mstanggota' AND $act=='input'){
       
	  
     $insert = "insert into mstanggota (stsanggota)  
							values('$_POST[stsanggota]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Status Anggota Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=mstanggota';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update mstanggota
  elseif ($module=='mstanggota' AND $act=='update'){
    
   
      $update= "UPDATE mstanggota SET stsanggota = '$_POST[stsanggota]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Status Anggota Berhasil update');
        window.location.href = '../../appmaster.php?module=mstanggota';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
