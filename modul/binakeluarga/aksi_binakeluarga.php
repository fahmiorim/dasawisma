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

  
  // Input Data koperasi
  if ($module=='binakeluarga' AND $act=='input'){
      
	  
       $insert = "insert into binakeluarga(tglentry,
								  kegiatan,
								  jumlah,
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
								'$_POST[jumlah]',
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
        alert('Data Bina Keluarga Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=binakeluarga';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update binakeluarga
  elseif ($module=='binakeluarga' AND $act=='update'){
		 
      $update= "UPDATE binakeluarga SET kegiatan = '$_POST[kegiatan]',
									jumlah= '$_POST[jumlah]',
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
        alert('Data Bina Keluarga Berhasil update');
        window.location.href = '../../appmaster.php?module=binakeluarga';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
