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
  if ($module=='tahunaktif' AND $act=='input'){
       
	  
     $insert = "insert into tahunaktif (thnaktif)  
							values('$_POST[namatahunaktif]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Tahun Aktif Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=tahunaktif';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
 
  elseif ($module=='tahunaktif' AND $act=='update'){
    
    $id    = $_POST['id']; 
	
    $namatahunaktif = $_POST['namatahunaktif'];
    
	$chkcount = count($id);
	
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE tahunaktif SET thnaktif = '$namatahunaktif[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Tahun Aktif Berhasil update');
        window.location.href = '../../appmaster.php?module=tahunaktif';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>
