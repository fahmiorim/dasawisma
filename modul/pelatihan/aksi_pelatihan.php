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

  
  // Input Data pelatihan
  if ($module=='pelatihan' AND $act=='input'){
      
	  
       $insert = "insert into pelatihan(tglentry,
								  nama,
								  nik,
								  noreg,
								  penyelenggara,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level,
								  namapelatihan,
								  kriteria,
								  tahun,
								  keterangan)
						values('$_POST[tglentry]',
								'$_POST[nama]',
								'$_POST[nik]',
								'$_POST[noreg]',
								'$_POST[penyelenggara]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[namapelatihan]',
								'$_POST[kriteria]',
								'$_POST[tahun]',
								'$_POST[keterangan]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Pelatihan Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=pelatihan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update pelatihan
  elseif ($module=='pelatihan' AND $act=='update'){
		 
      $update= "UPDATE pelatihan SET nik = '$_POST[nik]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									namapelatihan= '$_POST[namapelatihan]',
									nama= '$_POST[nama]',
									penyelenggara= '$_POST[penyelenggara]',
									tahun= '$_POST[tahun]',
									kriteria= '$_POST[kriteria]',
									keterangan= '$_POST[keterangan]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Pelatihan Berhasil update');
        window.location.href = '../../appmaster.php?module=pelatihan';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
