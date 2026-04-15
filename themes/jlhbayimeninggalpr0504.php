 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
$totbayimeninggalp0504 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0504 from kehamilan where kodekel='0504'");
						$jlhtotbayimeninggalp0504=pg_fetch_array($totbayimeninggalp0504); 
						$jumlahbayimeninggalp0504=$jlhtotbayimeninggalp0504[totjlhbayimeninggalp0504];
						$totjumlahbayimeninggalp0504=number_format($jumlahbayimeninggalp0504,0,",",".");
					echo "$totjumlahbayimeninggalp0504";
 } ?>