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

  
  // Input Data kriteria
  if ($module=='kriteria' AND $act=='input'){
       
	  
     $insert = "insert into kriteria (kode,nama_kriteria)  
							values('$_POST[kode]','$_POST[nama_kriteria]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kriteria Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=kriteria';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update kriteria
  elseif ($module=='kriteria' AND $act=='update'){
    
   
      $update= "UPDATE kriteria SET kode = '$_POST[kode]',
										nama_kriteria = '$_POST[nama_kriteria]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kriteria Berhasil update');
        window.location.href = '../../appmaster.php?module=kriteria';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
