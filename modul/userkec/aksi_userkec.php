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

  if ($module=='userkec' AND $act=='input'){
	$password     = md5($_POST['password']);
	 
     $insert = "insert into users(tgldaftar,
									username,
									nama_lengkap,
									password,
									level,
									nik,
									kodekec,
									nohp,
									namakec)  
				values('$_POST[tgldaftar]',
				'$_POST[username]',
				'$_POST[nama_lengkap]',
				'$password',
				'$_POST[level]',
				'$_POST[nik]',
				'$_POST[kodekec]',
				'$_POST[nohp]',
				'$_POST[nama_kec]'
				)";
									
	$result = pg_query($koneksi, $insert);
   	

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data User Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=userkec';
    </script>
    <?php
}


// Close the connection
pg_close($koneksi);
      
 }
  
  elseif ($module=='userkec' AND $act=='update'){
 	$password     = md5($_POST['password']);
      $update= "UPDATE users SET nik = '$_POST[nik]',
										username = '$_POST[username]',
										nama_lengkap = '$_POST[nama_lengkap]',
										password = '$password',
										level = '$_POST[level]',
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
        window.location.href = '../../appmaster.php?module=userkec';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>
