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

  
  // Input Data Pendidikan
  if ($module=='pendidikan' AND $act=='input'){
       
	  
     $insert = "insert into mstpendidikan (namapendidikan)  
							values('$_POST[namapendidikan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Pendidikan Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=pendidikan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update pendidikan
  elseif ($module=='pendidikan' AND $act=='update'){
    
   
      $update= "UPDATE mstpendidikan SET namapendidikan = '$_POST[namapendidikan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Pendidikan Berhasil update');
        window.location.href = '../../appmaster.php?module=pendidikan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
