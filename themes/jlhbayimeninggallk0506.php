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
	  
		  
$totbayimeninggalk0506 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0506 from kehamilan where kodekel='0506'");
						$jlhtotbayimeninggalk0506=pg_fetch_array($totbayimeninggalk0506); 
						$jumlahbayimeninggalk0506=$jlhtotbayimeninggalk0506[totjlhbayimeninggalk0506];
						$totjumlahbayimeninggalk0506=number_format($jumlahbayimeninggalk0506,0,",",".");
					echo "$totjumlahbayimeninggalk0506";
 } ?>