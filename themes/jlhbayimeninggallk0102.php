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
	  
		  
$totbayimeninggalk0102 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0102 from kehamilan where kodekel='0102'");
						$jlhtotbayimeninggalk0102=pg_fetch_array($totbayimeninggalk0102); 
						$jumlahbayimeninggalk0102=$jlhtotbayimeninggalk0102[totjlhbayimeninggalk0102];
						$totjumlahbayimeninggalk0102=number_format($jumlahbayimeninggalk0102,0,",",".");
					echo "$totjumlahbayimeninggalk0102";
 } ?>