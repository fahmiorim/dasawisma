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

  
  // Input Data Lingkungan
  if ($module=='lingkungan' AND $act=='input'){
       
	  
     $insert = "insert into lingkungan (kode,nama_lingkungan,keterangan)  
							values('$_POST[kode]','$_POST[nama_lingkungan]','$_POST[keterangan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Lingkungan Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=lingkungan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update lingkungan
  elseif ($module=='lingkungan' AND $act=='update'){
    
   
      $update= "UPDATE lingkungan SET kode = '$_POST[kode]',
										nama_lingkungan = '$_POST[nama_lingkungan]',
										keterangan = '$_POST[keterangan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Lingkungan Berhasil update');
        window.location.href = '../../appmaster.php?module=lingkungan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
