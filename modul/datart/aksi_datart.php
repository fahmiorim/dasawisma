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

  
  // Input Data datart
  if ($module=='datart' AND $act=='input'){
       
	  
     $insert = "insert into datart (kode,nama_datart,keterangan)  
							values('$_POST[kode]','$_POST[nama_datart]','$_POST[keterangan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data RT Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=datart';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update datart
  elseif ($module=='datart' AND $act=='update'){
    
   
      $update= "UPDATE datart SET kode = '$_POST[kode]',
										nama_datart = '$_POST[nama_datart]',
										keterangan = '$_POST[keterangan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data RT Berhasil update');
        window.location.href = '../../appmaster.php?module=datart';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
