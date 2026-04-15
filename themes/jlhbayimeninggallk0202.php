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
	  
		  
$totbayimeninggalk0202 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0202 from kehamilan where kodekel='0202'");
						$jlhtotbayimeninggalk0202=pg_fetch_array($totbayimeninggalk0202); 
						$jumlahbayimeninggalk0202=$jlhtotbayimeninggalk0202[totjlhbayimeninggalk0202];
						$totjumlahbayimeninggalk0202=number_format($jumlahbayimeninggalk0202,0,",",".");
					echo "$totjumlahbayimeninggalk0202";
 } ?>