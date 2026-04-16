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

  if ($module=='user' AND $act=='input'){
	$password     = md5($_POST['password']);
	 
     $insert = "insert into users(tgldaftar,
									username,
									nama_lengkap,
									password,
									level,
									nik,
									kodekel,
									namakel,
									kodekec,
									namakec,
									nohp)  
				values('$_POST[tgldaftar]',
				'$_POST[username]',
				'$_POST[nama_lengkap]',
				'$password',
				'$_POST[level]',
				'$_POST[nik]',
				'$_POST[kode]',
				'$_POST[nama_kel]',
				'$_POST[kodekec]',
				'$_POST[nama_kec]',
				'$_POST[nohp]'
				)";
									
	$result = pg_query($koneksi, $insert);
   	

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data User Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=user';
    </script>
    <?php
}


// Close the connection
pg_close($koneksi);
      
 }
  
  elseif ($module=='user' AND $act=='update'){
 	$password     = md5($_POST['password']);
      $update= "UPDATE users SET nik = '$_POST[nik]',
										username = '$_POST[username]',
										nama_lengkap = '$_POST[nama_lengkap]',
										password = '$password',
										level = '$_POST[level]',
										kodekel = '$_POST[kode]',
										namakel = '$_POST[nama_kel]',
										kodekec= '$_POST[kodekec]',
										nohp= '$_POST[nohp]',
										namakec='$_POST[nama_kec]'
							WHERE id = '$_POST[id]'";
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data user Berhasil update');
        window.location.href = '../../appmaster.php?module=user';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>
