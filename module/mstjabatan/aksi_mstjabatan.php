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

  
  // Input Jabatan Dalam PKK
  if ($module=='mstjabatan' AND $act=='input'){
       
	  
     $insert = "insert into mstjabatan (namajabatan)  
							values('$_POST[namajabatan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jabatan Dalam PKK Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=mstjabatan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update mstjabatan
  elseif ($module=='mstjabatan' AND $act=='update'){
    
   
      $update= "UPDATE mstjabatan SET namajabatan = '$_POST[namajabatan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Jabatan Dalam PKK Berhasil update');
        window.location.href = '../../appmaster.php?module=mstjabatan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
