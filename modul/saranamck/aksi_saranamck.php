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
  if ($module=='saranamck' AND $act=='input'){
      
	  
       $insert = "insert into saranamck(tglentry,
								  jlhpintu,
								  saranalain,
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
								'$_POST[jlhpintu]',
								'$_POST[saranalain]',
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
        alert('Data Sarana MCK Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=saranamck';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update saranamck
  elseif ($module=='saranamck' AND $act=='update'){
		 
      $update= "UPDATE saranamck SET jlhpintu = '$_POST[jlhpintu]',
									saranalain= '$_POST[saranalain]',
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
        alert('Data Sarana MCK Berhasil update');
        window.location.href = '../../appmaster.php?module=saranamck';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
