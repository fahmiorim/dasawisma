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

  
  // Input Data dasawisma
  if ($module=='dasawisma2' AND $act=='input'){
       
	  
     $insert = "insert into dasawisma (kode,nama_dasawisma,keterangan,kodekel,kelurahan,kodekec,kecamatan,lingkungan)  
							values('$_POST[kodedw]','$_POST[nama_dasawisma]','$_POST[keterangan]','$_POST[kode]','$_POST[nama_kel]','$_POST[kodekec]','$_POST[nama_kec]','$_POST[nama_lingkungan]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Dasawisma Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=dasawisma2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update dasawisma
  elseif ($module=='dasawisma2' AND $act=='update'){
    
   
      $update= "UPDATE dasawisma SET 	nama_dasawisma = '$_POST[nama_dasawisma]',
										lingkungan= '$_POST[nama_lingkungan]',
										kodekel= '$_POST[kode]',
										kelurahan= '$_POST[nama_kel]',
										kodekec= '$_POST[kodekec]',
										kecamatan= '$_POST[nama_kec]',
										keterangan = '$_POST[keterangan]'
                                    WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Dasawisma Berhasil update');
        window.location.href = '../../appmaster.php?module=dasawisma2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
