<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../404.php'); 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
   include "../../config/library.php";
  include "../../config/fungsi_thumbnail.php";
  
  $module = $_GET['module'];
  $act    = $_GET['act'];

  if ($module=='datawarga2' AND $act=='input'){
	
	$cek1=$_POST[lp3];
	 $cek2=$_POST[tpk3];
	 $cek3=$_POST[damas];
	
	$lokasi_file = $_FILES['foto_warga']['tmp_name'];
    $tipe_file   = $_FILES['foto_warga']['type'];
    $nama_file   = $_FILES['foto_warga']['name'];
    $acak           = rand(1,99);
    $nama_file_unik = $acak.$nama_file; 
	
	$ftwarga = "SELECT fotowarga from datawarga";
        $lfoto = pg_query($koneksi, $ftwarga);
        $k     = pg_fetch_array($lfoto);
        
        if ($k['fotowarga']!=''){
          $namafile = $k['fotowarga'];
          
          // hapus filenya
            
        }	  
		
	 
	  Uploadfoto($nama_file_unik ,'../../img/foto_warga/');
	
	 
     $insert = "insert into datawarga(noreg,
								  tgldaftar,
								  nama,
								  alamat,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  jabpkk,
								  jenkel,
								  tgllahir,
								  tempat,
								  stskawin,
								  pendidikan,
								  pekerjaan,
								  stsaktif,
								  kriteria,
								  userentry,
								  waktuentry,
								  stskel,
								  nik,
								  level,
								  agama,
								  akseptorkb,
								  jenisakseptor,
								  aktif_posyandu,
								  frekuensi,
								  bkb,
								  tabungan,
								  kelbelajar,
								  paud,
								  koperasi,
								  jenis_koperasi,
								  nokk,
								  nokrt,
								  namakrt) 
						values('$_POST[noreg]',
								'$_POST[tgldaftar]',
								'$_POST[nama]',
								'$_POST[alamat]',
								'$_POST[kode]',
								'$_POST[nama_kel]',
								'$_POST[kodekec]',
								'$_POST[nama_kec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[jabpkk]',
								'$_POST[jenkel]',
								'$_POST[tgllahir]',
								'$_POST[tempat]',
								'$_POST[stskawin]',
								'$_POST[pendidikan]',
								'$_POST[pekerjaan]',
								'Ya',
								'$_POST[kriteria]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[stskel]',
								'$_POST[nik]',
								'$_POST[level]',
								'$_POST[agama]',
								'$_POST[akseptorkb]',
								'$_POST[jenisakseptor]',
								'$_POST[aktif_posyandu]',
								'$_POST[frekuensi]',
								'$_POST[bkb]',
								'$_POST[tabungan]',
								'$_POST[kelbelajar]',
								'$_POST[paud]',
								'$_POST[koperasi]',
								'$_POST[jenis_koperasi]',
								'$_POST[nokk]',
								'$_POST[nokrt]',
								'$_POST[namakrt]'
								)";
	
	$result = pg_query($koneksi, $insert);
   

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Warga Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=datawarga2';
    </script>
    <?php
}


// Close the connection
pg_close($koneksi);
      
    }
  
  elseif ($module=='datawarga2' AND $act=='update'){
   
  							   
		$update= "UPDATE datawarga SET tgldaftar = '$_POST[tgldaftar]',
										nama = '$_POST[nama]',
										alamat = '$_POST[alamat]',
										lingkungan = '$_POST[nama_lingkungan]',
										dasawisma = '$_POST[dasawisma]',
										jabpkk = '$_POST[jabpkk]',
										jenkel = '$_POST[jenkel]',
										tgllahir = '$_POST[tgllahir]',
										tempat = '$_POST[tempat]',
										stskawin = '$_POST[stskawin]',
										pendidikan = '$_POST[pendidikan]',
										pekerjaan = '$_POST[pekerjaan]',
										stsaktif = '$_POST[stsaktif]',
										kriteria = '$_POST[kriteria]',
										stskel = '$_POST[stskel]',
										agama = '$_POST[agama]',
										nik = '$_POST[nik]',
										kodekel='$_POST[kode]',
										kelurahan='$_POST[nama_kel]',
										kodekec='$_POST[kodekec]',
										kecamatan='$_POST[nama_kec]',
										akseptorkb='$_POST[akseptorkb]',
										jenisakseptor='$_POST[jenisakseptor]',
										aktif_posyandu='$_POST[aktif_posyandu]',
										frekuensi='$_POST[frekuensi]',
										bkb='$_POST[bkb]',
										tabungan='$_POST[tabungan]',
										kelbelajar='$_POST[kelbelajar]',
										paud='$_POST[paud]',
										koperasi='$_POST[koperasi]',
										nokk='$_POST[nokk]',
										nokrt='$_POST[nokrt]',
										namakrt='$_POST[namakrt]',
										jenis_koperasi='$_POST[jenis_koperasi]'
                                   WHERE id = '$_POST[id]'";
     
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Warga Berhasil Diupdate');
        window.location.href = '../../appmaster.php?module=datawarga2';
    </script>
    <?php
	
	}
  }
elseif ($module=='datawarga2' AND $act=='update2'){
   
  $lokasi_file = $_FILES['foto_warga']['tmp_name'];
    $tipe_file   = $_FILES['foto_warga']['type'];
    $nama_file   = $_FILES['foto_warga']['name'];
    $acak           = rand(1,99);
    
	 $nama_file_unik = $acak.$nama_file; 
	 
	 $pasfoto = "SELECT fotowarga from datawarga where id='$_POST[id]'";
        $pfoto = pg_query($koneksi, $pasfoto);
        $k     = pg_fetch_array($pfoto);
        
        if ($k['fotowarga']!=''){
          $namafile = $k['fotowarga'];
          
          // hapus filenya
          unlink("../../img/foto_warga/$namafile");   
        } 
		 
	 
	  Uploadfoto($nama_file_unik ,'../../img/foto_warga/');
		
		
							   
		$update2= "UPDATE datawarga SET  fotowarga= '$nama_file_unik'
                                   WHERE id = '$_POST[id]'";
     
	
      $result = pg_query($koneksi, $update2);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Foto Warga Berhasil Diupload');
        window.location.href = '../../appmaster.php?module=datawarga2';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>
