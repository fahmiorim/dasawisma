<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}
// 
else{
  include "../../config/koneksi.php";
  include "../../config/fungsi_thumbnail.php";


  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // 
  if ($module=='resetpassword' AND $act=='input'){
	   $lokasi_file5 = $_FILES['gambar_user']['tmp_name'];
	   $tipe_file5  = $_FILES['gambar_user']['type'];
       $nama_file5   = $_FILES['gambar_user']['name'];
       $acak5        = rand(1,99);
	   $nama_gambar5 = $acak5.$nama_file5; 
	  if (empty($lokasi_file5)){
		  $username = $_POST['username'];
		  $nama_lengkap = $_POST['nama_lengkap'];
		  $password     = md5($_POST['password']);
		  $email = $_POST['email'];
      $input= "insert into users(username,
								 nama_lengkap,
								 password,
								 email
								
								) Values(
								'$username',
								'$nama_lengkap',
								'$password',
								'$email'
								
								
								)";
	
      $result = pg_query($koneksi, $input);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Password Berhasil tambah');
        window.location.href = '../../appmaster.php?module=resetpassword';
    </script>
    <?php
	
}

// 
pg_close($koneksi);
	 		 		
		}
			else {
	$ukuran5 = 200; 
	$folder5  = "../../assets/img/foto_user/"; //
	UploadFotoUser($nama_gambar5, $folder5, $ukuran5);				
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$nik = $_POST['nik'];
      $input= "insert into users(username,
								 nama_lengkap,
								 password, 
								 nik,
								 nohp,
								 foto
								
								) Values(
								'$username',
								'$nama_lengkap',
								'$password',
								'$nik',
								'$nama_gambar5'
								)";
	
      $result = pg_query($koneksi, $input);
      

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data User dan Foto Berhasil tambah');
        window.location.href = '../../appmaster.php?module=resetpassword';
    </script>
    <?php
	
}

// 
pg_close($koneksi);
      
    }
  }	
  

  // 
  elseif ($module=='resetpassword' AND $act=='update'){
    $lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file  = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak       = rand(1,99);
	$nama_gambar = $acak.$nama_file; 
	 if (empty($lokasi_file)){
    	
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$email = $_POST['email'];
    $id = $_POST['id'];
	$chkcount = count($id);
	 if (empty($_POST['password'])) {
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',
								 nohp= '$_POST[nohp]',
								 nik		= '$nik[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update);
	 } else {
		  $password = md5($_POST['password']);
			for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',	
								 password	= '$password',
								 nohp= '$_POST[nohp]',
								 nik		= '$nik[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update); 
	 }
if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	<script>
        alert('Data Password Berhasil diganti');
        window.location.href = '../../appmaster.php?module=resetpassword';
    </script>
    
    <?php
	
}

// Close the connection
pg_close($koneksi);
	 } else {
    $lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file  = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak       = rand(1,99);
	$fupload_name = $acak.$nama_file; 
	$ukuran = 200;
	$folder  = "../../assets/img/foto_user/"; //
	UploadFoto($fupload_name, $folder, $ukuran);				 
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$nik = $_POST['nik'];
    $id = $_POST['id'];
	$chkcount = count($id);
	
    if (empty($_POST['password'])) {
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',
								 foto		  = '$fupload_name',
								 nohp= '$_POST[nohp]',
								 nik		= '$nik[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update);
	 } else {
		  $password = md5($_POST['password']);
			for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',	
								 foto		  = '$nama_gambar6',
								 nohp= '$_POST[nohp]',
								 password	= '$password',
								 nik		= '$nik[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = pg_query($koneksi, $update); 
	 }

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	<script>
        alert('Data Password dan Foto Berhasil diganti');
        window.location.href = '../../appmaster.php?module=resetpassword';
    </script>
    
    <?php
	
}

// Close the connection
pg_close($koneksi);
		 
		 
	 }



    }
	
	
	
	
	
	

	}
?>
