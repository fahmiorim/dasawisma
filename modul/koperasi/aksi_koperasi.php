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
  if ($module=='koperasi' AND $act=='input'){
      
	  
       $insert = "insert into koperasi(tglentry,
								  namakoperasi,
								  jenis,
								  stshukum,
								  anggotalk,
								  anggotapr,
								  stspengelola,
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
								'$_POST[namakoperasi]',
								'$_POST[jenis]',
								'$_POST[stshukum]',
								'$_POST[anggotalk]',
								'$_POST[anggotapr]',
								'$_POST[stspengelola]',
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
        alert('Data Koperasi PKK Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=koperasi';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update koperasi
  elseif ($module=='koperasi' AND $act=='update'){
		 
      $update= "UPDATE koperasi SET namakoperasi = '$_POST[namakoperasi]',
									jenis= '$_POST[jenis]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									stshukum= '$_POST[stshukum]',
									anggotalk= '$_POST[anggotalk]',
									anggotapr= '$_POST[anggotapr]',
									stspengelola= '$_POST[stspengelola]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Koperasi PKK Berhasil update');
        window.location.href = '../../appmaster.php?module=koperasi';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
