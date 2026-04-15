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
	  
		  
$totbayimeninggalk0507 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0507 from kehamilan where kodekel='0507'");
						$jlhtotbayimeninggalk0507=pg_fetch_array($totbayimeninggalk0507); 
						$jumlahbayimeninggalk0507=$jlhtotbayimeninggalk0507[totjlhbayimeninggalk0507];
						$totjumlahbayimeninggalk0507=number_format($jumlahbayimeninggalk0507,0,",",".");
					echo "$totjumlahbayimeninggalk0507";
 } ?>