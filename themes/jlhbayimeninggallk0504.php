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
	  
		  
$totbayimeninggalk0504 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0504 from kehamilan where kodekel='0504'");
						$jlhtotbayimeninggalk0504=pg_fetch_array($totbayimeninggalk0504); 
						$jumlahbayimeninggalk0504=$jlhtotbayimeninggalk0504[totjlhbayimeninggalk0504];
						$totjumlahbayimeninggalk0504=number_format($jumlahbayimeninggalk0504,0,",",".");
					echo "$totjumlahbayimeninggalk0504";
 } ?>