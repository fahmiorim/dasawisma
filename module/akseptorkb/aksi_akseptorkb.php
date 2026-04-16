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

  
  // Input Data Jenis Akseptor KB
  if ($module=='akseptorkb' AND $act=='input'){
       
	  
     $insert = "insert into akseptorkb (jenisakseptorkb)  
							values('$_POST[jenisakseptorkb]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jenis Akseptor KB Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=akseptorkb';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update akseptorkb
  elseif ($module=='akseptorkb' AND $act=='update'){
    
   
      $update= "UPDATE akseptorkb SET jenisakseptorkb = '$_POST[jenisakseptorkb]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jenis Akseptor KB Berhasil update');
        window.location.href = '../../appmaster.php?module=akseptorkb';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
