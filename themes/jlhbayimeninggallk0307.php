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
	  
		  
$totbayimeninggalk0307 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0307 from kehamilan where kodekel='0307'");
						$jlhtotbayimeninggalk0307=pg_fetch_array($totbayimeninggalk0307); 
						$jumlahbayimeninggalk0307=$jlhtotbayimeninggalk0307[totjlhbayimeninggalk0307];
						$totjumlahbayimeninggalk0307=number_format($jumlahbayimeninggalk0307,0,",",".");
					echo "$totjumlahbayimeninggalk0307";
 } ?>