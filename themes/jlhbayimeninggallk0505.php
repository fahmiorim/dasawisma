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
	  
		  
$totbayimeninggalk0505 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0505 from kehamilan where kodekel='0505'");
						$jlhtotbayimeninggalk0505=pg_fetch_array($totbayimeninggalk0505); 
						$jumlahbayimeninggalk0505=$jlhtotbayimeninggalk0505[totjlhbayimeninggalk0505];
						$totjumlahbayimeninggalk0505=number_format($jumlahbayimeninggalk0505,0,",",".");
					echo "$totjumlahbayimeninggalk0505";
 } ?>