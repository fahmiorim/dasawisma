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

  
  // Input Data sipkunjungan
  if ($module=='sipkunjungan' AND $act=='input'){
       
	  
       $insert = "insert into sipkunjungan(tglentry,
								 bulan,
								  tahun,
								  namaposyandu,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level,
								   balitabarup12,
								  balitabarul12,
								  balitalamap12,
								  balitalamal12,
								   balitabarup5,
								  balitabarul5,
								  balitalamap5,
								  balitalamal5,
								  wus,
								  wusyd,
								  pus,
								  pusyd,
								  hamil,
								  hamilyd,
								  menyusui,
								  menyusuiyd,
								  kaderl,
								  kaderp,
								  plkbl,
								  plkbp,
								  medisl,
								  medisp,
								  bayil,
								  bayip,
								  meninggalbayil,
								  meninggalbayip,
								  nobln,
								  idposyandu) 
						values('$_POST[tglentry]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[namaposyandu]',
								'$_POST[kodekel]',
								'$_POST[kelurahan]',
								'$_POST[kodekec]',
								'$_POST[kecamatan]',
								'$_POST[lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[balitabarup12]',
								'$_POST[balitabarul12]',
								'$_POST[balitalamap12]',
								'$_POST[balitalamal12]',
								'$_POST[balitabarup5]',
								'$_POST[balitabarul5]',
								'$_POST[balitalamap5]',
								'$_POST[balitalamal5]',
								'$_POST[wus]',
								'$_POST[wusyd]',
								'$_POST[pus]',
								'$_POST[pusyd]',
								'$_POST[hamil]',
								'$_POST[hamilyd]',
								'$_POST[menyusui]',
								'$_POST[menyusuiyd]',
								'$_POST[kaderl]',
								'$_POST[kaderp]',
								'$_POST[plkbl]',
								'$_POST[plkbp]',
								'$_POST[medisl]',
								'$_POST[medisp]',
								'$_POST[bayil]',
								'$_POST[bayip]',
								'$_POST[meninggalbayil]',
								'$_POST[meninggalbayip]',
								'$_POST[nobln]',
								'$_POST[idposyandu]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data SIP Pengunjung Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=sipkunjungan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update sipkunjungan
  elseif ($module=='sipkunjungan' AND $act=='update'){
   
      $update= "UPDATE sipkunjungan SET bulan = '$_POST[bulan]',
									tahun= '$_POST[tahun]',
									idposyandu = '$_POST[idposyandu]',
									namaposyandu= '$_POST[namaposyandu]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[kelurahan]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[kecamatan]',
									lingkungan= '$_POST[lingkungan]',
									dasawisma= '$_POST[dasawisma]',
									balitabarup12= '$_POST[balitabarup12]',
									balitabarul12= '$_POST[balitabarul12]',
									balitalamap12= '$_POST[balitalamap12]',
									balitalamal12= '$_POST[balitalamal12]',
									balitabarup5= '$_POST[balitabarup5]',
									balitabarul5= '$_POST[balitabarul5]',
									balitalamap5= '$_POST[balitalamap5]',
									balitalamal5= '$_POST[balitalamal5]',
									wus= '$_POST[wus]',
									wusyd= '$_POST[wusyd]',
									pus= '$_POST[pus]',
									pusyd= '$_POST[pusyd]',
									hamil= '$_POST[hamil]',
									hamilyd= '$_POST[hamilyd]',
									menyusui= '$_POST[menyusui]',
									menyusuiyd= '$_POST[menyusuiyd]',
									kaderl= '$_POST[kaderl]',
									kaderp= '$_POST[kaderp]',
									plkbl= '$_POST[plkbl]',
									plkbp= '$_POST[plkbp]',
									medisl= '$_POST[medisl]',
									medisp= '$_POST[medisp]',
									bayil= '$_POST[bayil]',
									bayip= '$_POST[bayip]',
									meninggalbayil= '$_POST[meninggalbayil]',
									meninggalbayip= '$_POST[meninggalbayip]',
									nobln= '$_POST[nobln]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data SIP Pengunjung Berhasil update');
        window.location.href = '../../appmaster.php?module=sipkunjungan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
