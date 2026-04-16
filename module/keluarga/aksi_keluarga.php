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

  
  // Input Data keluarga
  if ($module=='keluarga' AND $act=='input'){
       
	  //cek kk yang sama
	 $ceknokk = $_POST[nokk];

       $insert = "insert into keluarga(nokk,
								  noreg,
								  dasawisma,
								  lingkungan,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  namakk,
								  tglentry,
								  anggotakel,
								  anggotakelpr,
								  anggotakelw,
								  jlhkk,
								  balita,
								  balitapr,
								  balitaw,
								  wus,
								  bumil,
								  lansia,
								  pus,
								  buta3,
								  ibumenyusui,
								  makanan,
								  jenis_makanan,
								  jamban,
								  jlhjamban,
								  sumberair,
								  sampah,
								  spal,
								  p4k,
								  rumah,
								  up2k,
								  jenis_usaha,
								  kes_lingk,
								  userentry,
								  waktuentry,
								  level,
								  pekarangan,
								  industri,
								  bakti,
								  nokrt,
								  komoditi_industri,
								  nama_komoditi_industri,
								  komoditi_lahan,
								  kbk) 
						values('$_POST[nokk]',
								'$_POST[noreg]',
								'$_POST[dasawisma]',
								'$_POST[nama_lingkungan]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[namakk]',
								'$_POST[tglentry]',
								'$_POST[anggotakel]',
								'$_POST[anggotakelpr]',
								'$_POST[anggotakelw]',
								'$_POST[jlhkk]',
								'$_POST[balita]',
								'$_POST[balitapr]',
								'$_POST[balitaw]',
								'$_POST[wus]',
								'$_POST[bumil]',
								'$_POST[lansia]',
								'$_POST[pus]',
								'$_POST[buta3]',
								'$_POST[ibum]',
								'$_POST[makanan]',
								'$_POST[jenis_makanan]',
								'$_POST[jamban]',
								'$_POST[jlhjamban]',
								'$_POST[sumberair]',
								'$_POST[sampah]',
								'$_POST[spal]',
								'$_POST[p4k]',
								'$_POST[rumah]',
								'$_POST[up2k]',
								'$_POST[jenis_usaha]',
								'$_POST[kes_lingk]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[pekarangan]',
								'$_POST[industri]',
								'$_POST[bakti]',
								'$_POST[nokrt]',
								'$_POST[komoditi_industri]',
								'$_POST[nama_komoditi]',
								'$_POST[komoditi_lahan]',
								'$_POST[kbk]'
								)";
$query = pg_query($koneksi, "SELECT * FROM keluarga WHERE nokk ='$ceknokk'"); 
	$cek = pg_num_rows($query);
	
   if($cek > 0){

	?>
	   
	   <script>
        alert('No KK sudah ada');
        window.location.href = '../../appmaster.php?module=keluarga';
    </script>

<?php
	 
 } else {
$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data keluarga Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=keluarga';
    </script>
    <?php
}
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update keluarga
  elseif ($module=='keluarga' AND $act=='update'){

   
      $update= "UPDATE keluarga SET nokk = '$_POST[nokk]',
									noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									namakk= '$_POST[namakk]',
									tglentry= '$_POST[tglentry]',
									anggotakel= '$_POST[anggotakel]',
									anggotakelpr= '$_POST[anggotakelpr]',
									anggotakelw= '$_POST[anggotakelw]',
									jlhkk= '$_POST[jlhkk]',
									balita= '$_POST[balita]',
									balitapr= '$_POST[balitapr]',
									balitaw= '$_POST[balitaw]',
									wus= '$_POST[wus]',
									bumil= '$_POST[bumil]',
									lansia= '$_POST[lansia]',
									pus= '$_POST[pus]',
									buta3= '$_POST[buta3]',
									ibumenyusui= '$_POST[ibum]',
									makanan= '$_POST[makanan]',
									nokrt= '$_POST[nokrt]',
									jenis_makanan= '$_POST[jenis_makanan]',
									jamban= '$_POST[jamban]',
									jlhjamban= '$_POST[jlhjamban]',
									sumberair= '$_POST[sumberair]',
									sampah= '$_POST[sampah]',
									spal= '$_POST[spal]',
									p4k= '$_POST[p4k]',
									rumah= '$_POST[rumah]',
									up2k= '$_POST[up2k]',
									jenis_usaha= '$_POST[jenis_usaha]',
									kes_lingk= '$_POST[kes_lingk]',
									kbk= '$_POST[kbk]',
									pekarangan= '$_POST[pekarangan]',
									industri= '$_POST[industri]',
									bakti= '$_POST[bakti]',
									komoditi_industri='$_POST[komoditi_industri]',
									nama_komoditi_industri='$_POST[nama_komoditi]',
									komoditi_lahan='$_POST[komoditi_lahan]'
                                WHERE id = '$_POST[id]'";
      
// 	  $query = pg_query($koneksi, "SELECT * FROM keluarga WHERE nokk ='$ceknokk'"); 
// 	  $cek = pg_num_rows($query);
	  
// 	 if($cek > 0){
  
// 	  ?>
		 
// 		 <script>
// 		  alert('No KK sudah ada');
// 		  window.location.href = '../../appmaster.php?module=keluarga';
// 	  </script>
  
//   <?php
	   
//    } else {

      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data keluarga Berhasil update');
        window.location.href = '../../appmaster.php?module=keluarga';
    </script>
    <?php
	

   }

// Close the connection
pg_close($koneksi);
    }
  
}
?>
