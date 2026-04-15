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
	  
		  
$totbayimeninggalk0407 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0407 from kehamilan where kodekel='0407'");
						$jlhtotbayimeninggalk0407=pg_fetch_array($totbayimeninggalk0407); 
						$jumlahbayimeninggalk0407=$jlhtotbayimeninggalk0407[totjlhbayimeninggalk0407];
						$totjumlahbayimeninggalk0407=number_format($jumlahbayimeninggalk0407,0,",",".");
					echo "$totjumlahbayimeninggalk0407";
 } ?>