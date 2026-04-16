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

  
  // Input Data kategori
  if ($module=='kategori' AND $act=='input'){
       
	  
     $insert = "insert into mstkategori (kategori)  
							values('$_POST[namakategori]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kategori Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=kategori';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update kategori
  elseif ($module=='kategori' AND $act=='update'){
    
   
      $update= "UPDATE mstkategori SET kategori = '$_POST[namakategori]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kategori Berhasil update');
        window.location.href = '../../appmaster.php?module=kategori';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
