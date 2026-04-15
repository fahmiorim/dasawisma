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
	  
		  
$totbayimeninggalk0503 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0503 from kehamilan where kodekel='0503'");
						$jlhtotbayimeninggalk0503=pg_fetch_array($totbayimeninggalk0503); 
						$jumlahbayimeninggalk0503=$jlhtotbayimeninggalk0503[totjlhbayimeninggalk0503];
						$totjumlahbayimeninggalk0503=number_format($jumlahbayimeninggalk0503,0,",",".");
					echo "$totjumlahbayimeninggalk0503";
 } ?>