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

  
  // Input Data KRT
  if ($module=='datakrt2' AND $act=='input'){
       
	  
     $insert = "insert into datakrt (nokrt,
									namakrt,
									kodekel,
									kodekec,
									kelurahan,
									kecamatan,
									kode,
									nama_dasawisma,
									nama_lingkungan
									)  
							values('$_POST[nokrt]',
								   '$_POST[namakrt]',
								   '$_POST[kodekel]',
								   '$_POST[kodekec]',
								   '$_POST[kelurahan]',
								   '$_POST[kecamatan]',
								   '$_POST[kode]',
								   '$_POST[nama_dasawisma]',
								   '$_POST[nama_lingkungan]'
								   )";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kepala Rumah Tangga Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=datakrt2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update datakrt
  elseif ($module=='datakrt2' AND $act=='update'){
    
   
      $update= "UPDATE datakrt SET namakrt = '$_POST[namakrt]',
									kodekel = '$_POST[kodekel]',
									kodekec = '$_POST[kodekec]',
									kelurahan = '$_POST[kelurahan]',
									kecamatan = '$_POST[kecamatan]',
									kode = '$_POST[kode]',
									nama_dasawisma = '$_POST[nama_dasawisma]',
									nama_lingkungan = '$_POST[nama_lingkungan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kepala Rumah Tangga Berhasil update');
        window.location.href = '../../appmaster.php?module=datakrt2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
