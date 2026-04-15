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

  
  // Input Data datarw
  if ($module=='datarw' AND $act=='input'){
       
	  
     $insert = "insert into datarw (kode,nama_datarw,keterangan)  
							values('$_POST[kode]','$_POST[nama_datarw]','$_POST[keterangan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data RW Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=datarw';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update datarw
  elseif ($module=='datarw' AND $act=='update'){
    
   
      $update= "UPDATE datarw SET kode = '$_POST[kode]',
										nama_datarw = '$_POST[nama_datarw]',
										keterangan = '$_POST[keterangan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data RW Berhasil update');
        window.location.href = '../../appmaster.php?module=datarw';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
