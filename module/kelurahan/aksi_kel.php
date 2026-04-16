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

  
  // Input Data Kelurahan
  if ($module=='kelurahan' AND $act=='input'){
       
	  
     $insert = "insert into kelurahan (kode,nama_kel,kodekec,nama_kec,kode_pos,nama_lurah,alamat,nohp,jumlah_kk)  
							values('$_POST[kode_kel]','$_POST[nama_kel]','$_POST[kodekec]','$_POST[nama_kec]','$_POST[kode_pos]',
              '$_POST[nama_lurah]','$_POST[alamat]','$_POST[nohp]','$_POST[jumlah_kk]')";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=kelurahan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update kelurahan
  elseif ($module=='kelurahan' AND $act=='update'){
    
    $id    = $_POST['id']; 
	$kode_kel = $_POST['kode_kel'];
  $nama_kel = $_POST['nama_kel'];
  $kodekec = $_POST['kodekec'];
  $nama_kec = $_POST['nama_kec'];
  $kode_pos = $_POST['kode_pos'];
	$nohp = $_POST['nohp'];
	$nama_lurah = $_POST['nama_lurah'];
	$alamat = $_POST['alamat'];
	$jumlah_kk = $_POST['jumlah_kk'];
	
	$chkcount = count($id);
	
    // Apabila gambar tidak diganti
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE kelurahan SET 
                    nama_kel  = '$nama_kel[$i]',
                    kodekec  = '$kodekec',
										nama_kec	= '$nama_kec',
										kode_pos	= '$kode_pos[$i]',
										nohp		= '$nohp[$i]',
										jumlah_kk		= '$jumlah_kk[$i]',
										nama_lurah	= '$nama_lurah[$i]',
										alamat		= '$alamat[$i]',
										kode		= '$kode_kel[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('kelurahan Berhasil update');
        window.location.href = '../../appmaster.php?module=kelurahan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>
