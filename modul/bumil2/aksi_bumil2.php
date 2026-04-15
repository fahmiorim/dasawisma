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

  
  // Input Data bumil
  if ($module=='bumil2' AND $act=='input'){
      
	  
       $insert = "insert into bumil(tglentry,
								  bulan,
								  tahun,
								  nik,
								  namabumil,
								  namasuami,
								  userentry,
								  waktuentry,
								  level,
								  usiahamil,
								  noreg,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma) 
						values('$_POST[tglentry]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[nik]',
								'$_POST[namabumil]',
								'$_POST[namasuami]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[usiahamil]',
								'$_POST[noreg]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Ibu Hamil Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=bumil2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update bumil
  elseif ($module=='bumil2' AND $act=='update'){
		 
      $update= "UPDATE bumil SET nik = '$_POST[nik]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namabumil= '$_POST[namabumil]',
									namasuami= '$_POST[namasuami]',
									usiahamil= '$_POST[usiahamil]',
									bulan= '$_POST[bulan]',
									tahun= '$_POST[tahun]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Ibu Hamil Berhasil update');
        window.location.href = '../../appmaster.php?module=bumil2';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
