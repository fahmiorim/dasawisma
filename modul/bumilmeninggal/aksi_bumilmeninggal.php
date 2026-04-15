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

  
  // Input Data bumilmeninggal
  if ($module=='bumilmeninggal' AND $act=='input'){
      
	  
       $insert = "insert into bumilmeninggal(tglentry,
								  bulan,
								  tahun,
								  nama,
								  statusibu,
								  userentry,
								  waktuentry,
								  level,
								  noreg,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  jenkel,
								  tglmeninggal,
								  sebabmeninggal,
								  keterangan,
								  namabayi) 
						values('$_POST[tglentry]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[nama]',
								'$_POST[statusibu]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[noreg]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[jenkel]',
								'$_POST[tglmeninggal]',
								'$_POST[sebabmeninggal]',
								'$_POST[keterangan]',
								'$_POST[namabayi]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Balita dan Ibu Hamil Meninggal Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=bumilmeninggal';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update bumilmeninggal
  elseif ($module=='bumilmeninggal' AND $act=='update'){
		 
      $update= "UPDATE bumilmeninggal SET noreg= '$_POST[noreg]',
									dasawisma= '$_POST[dasawisma]',
									lingkungan= '$_POST[nama_lingkungan]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[namakel]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[namakec]',
									nama= '$_POST[nama]',
									statusibu= '$_POST[statusibu]',
									jenkel= '$_POST[jenkel]',
									tglmeninggal= '$_POST[tglmeninggal]',
									sebabmeninggal= '$_POST[sebabmeninggal]',
									keterangan= '$_POST[keterangan]',
									namabayi= '$_POST[namabayi]',
									bulan= '$_POST[bulan]',
									tahun= '$_POST[tahun]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Balita dan Ibu Hamil Meninggal Berhasil update');
        window.location.href = '../../appmaster.php?module=bumilmeninggal';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
