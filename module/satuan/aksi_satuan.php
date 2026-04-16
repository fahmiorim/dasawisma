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

  
  // Input Data satuan
  if ($module=='satuan' AND $act=='input'){
       
	  
     $insert = "insert into mstsatuan (satuan)  
							values('$_POST[namasatuan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Satuan Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=satuan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update satuan
  elseif ($module=='satuan' AND $act=='update'){
    
   
      $update= "UPDATE mstsatuan SET satuan = '$_POST[namasatuan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Satuan Berhasil update');
        window.location.href = '../../appmaster.php?module=satuan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
