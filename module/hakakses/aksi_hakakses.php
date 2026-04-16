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

  
  // Input izin
  if ($module=='hakakses' AND $act=='input'){
       
	  
     $insert = "insert into hakakses (nama_hak_ases)  
							values('$_POST[namahakakses]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Hak Akses Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=hakakses';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
 
  elseif ($module=='hakakses' AND $act=='update'){
    
    $id    = $_POST['id']; 
	
    $namahakakses = $_POST['namahakakses'];
    
	$chkcount = count($id);
	
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE hakakses SET nama_hak_ases = '$namahakakses[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Hak Akses Berhasil update');
        window.location.href = '../../appmaster.php?module=hakakses';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>

