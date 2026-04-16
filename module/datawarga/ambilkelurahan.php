<?php
session_start();
 if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
  
}
else{
include "../../config/koneksi.php";
$kecamatan = $_GET['kecamatan'];
$kec = pg_query($koneksi, "SELECT kode,nama_kel FROM kelurahan WHERE nama_kec='$kecamatan' order by nama_kel");
echo "<option></option>";
while($k = pg_fetch_array($kec)){
echo "<option value=\"".$k['nama_kel']."\">".$k['nama_kel']."</option>\n";
}
}
?>