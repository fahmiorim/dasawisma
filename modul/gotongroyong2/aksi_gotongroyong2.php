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

  
  // Input Data gotongroyong
  if ($module=='gotongroyong2' AND $act=='input'){
      
	  
       $insert = "insert into gotongroyong(tglentry,
								  kegiatan,
								  jlhkelompok,
								  sumberdana,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level)
						values('$_POST[tglentry]',
								'$_POST[kegiatan]',
								'$_POST[jlhkelompok]',
								'$_POST[sumberdana]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Kegiatan Warga Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=gotongroyong2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update gotongroyong
  elseif ($module=='gotongroyong2' AND $act=='update'){
		 
      $update= "UPDATE gotongroyong SET kegiatan = '$_POST[kegiatan]',
									jlhkelompok= '$_POST[jlhkelompok]',
									sumberdana= '$_POST[sumberdana]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Kegiatan Warga Berhasil update');
        window.location.href = '../../appmaster.php?module=gotongroyong2';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
