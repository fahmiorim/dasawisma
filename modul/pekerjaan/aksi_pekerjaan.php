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

  
  // Input Data Pekerjaan
  if ($module=='pekerjaan' AND $act=='input'){
       
	  
     $insert = "insert into mstpekerjaan (namapekerjaan)  
							values('$_POST[namapekerjaan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Pekerjaan Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=pekerjaan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update pekerjaan
  elseif ($module=='pekerjaan' AND $act=='update'){
    
   
      $update= "UPDATE mstpekerjaan SET namapekerjaan = '$_POST[namapekerjaan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Pekerjaan Berhasil update');
        window.location.href = '../../appmaster.php?module=pekerjaan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
