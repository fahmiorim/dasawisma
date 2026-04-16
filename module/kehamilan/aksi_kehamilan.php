<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../../404.php'); 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  


  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // Input Data kehamilan
  if ($module=='kehamilan' AND $act=='input'){
      
	  
       $insert = "insert into kehamilan(tglentry,
								  bulan,
								  tahun,
								  jlhbumil,
								  jlhmelahirkan,
								  jlhnifas,
								  jlhmeninggal,
								  bayilahirp,
								  bayilahirl,
								  akte,
								  bayimeninggalp,
								  bayimeninggalk,
								  balitap,
								  balital,
								  keterangan,
								  userentry,
								  waktuentry,
								  level,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma) 
						values('$_POST[tglentry]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[jlhbumil]',
								'$_POST[jlhmelahirkan]',
								'$_POST[jlhnifas]',
								'$_POST[jlhmeninggal]',
								'$_POST[bayilahirp]',
								'$_POST[bayilahirl]',
								'$_POST[akte]',
								'$_POST[bayimeninggalp]',
								'$_POST[bayimeninggalk]',
								'$_POST[balitap]',
								'$_POST[balital]',
								'$_POST[keterangan]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
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
        alert('Data Catatan Kehamilan,Melahirkan,Nifas Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=kehamilan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update kehamilan
  elseif ($module=='kehamilan' AND $act=='update'){
	
      $update= "UPDATE kehamilan SET jlhbumil = '$_POST[jlhbumil]',
									jlhmelahirkan= '$_POST[jlhmelahirkan]',
									jlhnifas= '$_POST[jlhnifas]',
									jlhmeninggal= '$_POST[jlhmeninggal]',
									bayilahirp= '$_POST[bayilahirp]',
									bayilahirl= '$_POST[bayilahirl]',
									akte= '$_POST[akte]',
									bayimeninggalp= '$_POST[bayimeninggalp]',
									bayimeninggalk= '$_POST[bayimeninggalk]',
									balitap= '$_POST[balitap]',
									balital= '$_POST[balital]',
									keterangan= '$_POST[keterangan]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									bulan= '$_POST[bulan]',
									tahun= '$_POST[tahun]',
									userentry= '$_POST[userentry]',
									waktuentry= '$_POST[waktuentry]',
									level= '$_POST[level]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Data Catatan Kehamilan,Melahirkan,Nifas Berhasil update');
        window.location.href = '../../appmaster.php?module=kehamilan';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
