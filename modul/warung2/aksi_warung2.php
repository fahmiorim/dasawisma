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

  
  // Input Data warung
  if ($module=='warung2' AND $act=='input'){
      
	  
       $insert = "insert into warung(tglentry,
								  namawarung,
								  pengelola,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level,
								  komoditi,
								  kategori,
								  volume)
						values('$_POST[tglentry]',
								'$_POST[namawarung]',
								'$_POST[pengelola]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[komoditi]',
								'$_POST[kategori]',
								'$_POST[volume]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Warung PKK Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=warung2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update warung
  elseif ($module=='warung2' AND $act=='update'){
		 
      $update= "UPDATE warung SET	dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namawarung= '$_POST[namawarung]',
									pengelola= '$_POST[pengelola]',
									volume= '$_POST[volume]',
									komoditi= '$_POST[komoditi]',
									kategori= '$_POST[kategori]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Warung PKK Berhasil update');
        window.location.href = '../../appmaster.php?module=warung2';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
