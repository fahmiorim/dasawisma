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
	  
		  
$totbayimeninggalk0301 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0301 from kehamilan where kodekel='0301'");
						$jlhtotbayimeninggalk0301=pg_fetch_array($totbayimeninggalk0301); 
						$jumlahbayimeninggalk0301=$jlhtotbayimeninggalk0301[totjlhbayimeninggalk0301];
						$totjumlahbayimeninggalk0301=number_format($jumlahbayimeninggalk0301,0,",",".");
					echo "$totjumlahbayimeninggalk0301";
 } ?>