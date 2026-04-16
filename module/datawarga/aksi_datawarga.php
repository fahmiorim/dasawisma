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

  if ($module=='datawarga' AND $act=='input'){
	
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
	
	 $syarat1=$_POST[cek1];
	 $syarat2=$_POST[cek2];
	 $syarat3=$_POST[cek3];
	 $syarat4=$_POST[cek4];
	 $syarat5=$_POST[cek5];
	 $syarat6=$_POST[cek6];
	 
	  $syarat7=$_POST[cek7];
	 $syarat8=$_POST[cek8];
	 $syarat9=$_POST[cek9];
	 $syarat10=$_POST[cek10];
	 $syarat11=$_POST[cek11];
	 $syarat12=$_POST[cek12];
	 
	  $syarat13=$_POST[cek13];
	 $syarat14=$_POST[cek14];
	 $syarat15=$_POST[cek15];
	 $syarat16=$_POST[cek16];
	 $syarat17=$_POST[cek17];
	 $syarat18=$_POST[cek18];
	 $syarat19=$_POST[cek19];
	 $syarat20=$_POST[cek20];
	 $syarat21=$_POST[cek21];


	 //cek kk yang sama
	 $ceknik = $_POST[nik];
	   
	 
	
	 
     $insert = "insert into datawarga(noreg,
								  tgldaftar,
								  nama,
								  alamat_domisili,
								  alamat_ktp,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  kode,
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
								  namakrt,
								  stsbendera,
								  stsmusrenbang,
								  stsbela,
								  stssiskamling,
								  stssosialisasi,
								  stslingk,
								  stsibadah,
								  stspenataan,
								  stsbencana,
								  stssarpras,
								  stsstm,
								  stswirid,
								  stspengajian,
								  stskebaktian,
								  stsuang,
								  stsberas,
								  stssembako,
								  stskecamatan,
								  stskelurahan,
								  stslingkungan,
								  stsdasawisma) 
						values('$_POST[noreg]',
								'$_POST[tgldaftar]',
								'$_POST[nama]',
								'$_POST[alamat_domisili]',
								'$_POST[alamat_ktp]',
								'$_POST[kodekel]',
								'$_POST[namakel]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[nama_lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[kode]',
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
								'$_POST[namakrt]',
								'$syarat1',
								'$syarat2',
								'$syarat3',
								'$syarat4',
								'$syarat5',
								'$syarat6',
								'$syarat7',
								'$syarat8',
								'$syarat9',
								'$syarat10',
								'$syarat11',
								'$syarat12',
								'$syarat13',
								'$syarat14',
								'$syarat15',
								'$syarat16',
								'$syarat17',
								'$syarat18',
								'$syarat19',
								'$syarat20',
								'$syarat21'
								)";

	$query = pg_query($koneksi, "SELECT * FROM datawarga WHERE nik ='$ceknik'"); 
	$cek = pg_num_rows($query);
	
   if($cek > 0){

	?>
	   
	   <script>
        alert('NIK sudah terdaftar');
        window.location.href = '../../appmaster.php?module=datawarga';
    </script>

<?php
	 
 } else {
	
	$result = pg_query($koneksi, $insert);
 

		if(!$result){
			echo pg_last_error($koneksi);
		  } else {
  
	 ?>
	
    <script>
        alert('Data Warga Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=datawarga';
    </script>
    <?php

		  }
	}


// Close the connection
pg_close($koneksi);
      
    }
  
  elseif ($module=='datawarga' AND $act=='update'){

  							   
		$update= "UPDATE datawarga SET tgldaftar = '$_POST[tgldaftar]',
										nama = '$_POST[nama]',
										alamat_domisili = '$_POST[alamat_domisili]',
										alamat_ktp = '$_POST[alamat_ktp]',
										lingkungan = '$_POST[nama_lingkungan]',
										dasawisma = '$_POST[dasawisma]',
										kode = '$_POST[kode]',
										jabpkk = '$_POST[jabpkk]',
										jenkel = '$_POST[jenkel]',
										tgllahir = '$_POST[tgllahir]',
										tempat = '$_POST[tempat]',
										stskawin = '$_POST[stskawin]',
										pendidikan = '$_POST[pendidikan]',
										pekerjaan = '$_POST[pekerjaan]',
										stsaktif = 'Ya',
										kriteria = '$_POST[kriteria]',
										stskel = '$_POST[stskel]',
										agama = '$_POST[agama]',
										nik = '$_POST[nik]',
										nokrt = '$_POST[nokrt]',
										namakrt = '$_POST[namakrt]',
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
										jenis_koperasi='$_POST[jenis_koperasi]',
										stsbendera='$_POST[cek1]',
										stsmusrenbang='$_POST[cek2]',
										stsbela='$_POST[cek3]',
										stssiskamling='$_POST[cek4]',
										stssosialisasi='$_POST[cek5]',
										stslingk='$_POST[cek6]',
										stsibadah='$_POST[cek7]',
										stspenataan='$_POST[cek8]',
										stsbencana='$_POST[cek9]',
										stssarpras='$_POST[cek10]',
										stsstm='$_POST[cek11]',
										stswirid='$_POST[cek12]',
										stspengajian='$_POST[cek13]',
										stskebaktian='$_POST[cek14]',
										stsuang='$_POST[cek15]',
										stsberas='$_POST[cek16]',
										stssembako='$_POST[cek17]',
										stskecamatan='$_POST[cek18]',
										stskelurahan='$_POST[cek19]',
										stslingkungan='$_POST[cek20]',
										stsdasawisma='$_POST[cek21]'
                                   WHERE id = '$_POST[id]'";
     
	

      $result = pg_query($koneksi, $update);

	 
if(!$result){
  echo pg_last_error($koneksi);

}else {
  
	 ?>
	
    <script>
        alert('Data Warga Berhasil Diupdate');
        window.location.href = '../../appmaster.php?module=datawarga';
    </script>
    <?php
	
	
  }
}
elseif ($module=='datawarga' AND $act=='update2'){


   
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
        window.location.href = '../../appmaster.php?module=datawarga';
    </script>
    <?php
	

 }

// Close the connection
pg_close($koneksi);
    }
   
  
}
?>
