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
	  
		  
$totbayimeninggalk0405 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0405 from kehamilan where kodekel='0405'");
						$jlhtotbayimeninggalk0405=pg_fetch_array($totbayimeninggalk0405); 
						$jumlahbayimeninggalk0405=$jlhtotbayimeninggalk0405[totjlhbayimeninggalk0405];
						$totjumlahbayimeninggalk0405=number_format($jumlahbayimeninggalk0405,0,",",".");
					echo "$totjumlahbayimeninggalk0405";
 } ?>