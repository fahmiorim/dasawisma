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
	  
		  
$totbayimeninggalk0403 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0403 from kehamilan where kodekel='0403'");
						$jlhtotbayimeninggalk0403=pg_fetch_array($totbayimeninggalk0403); 
						$jumlahbayimeninggalk0403=$jlhtotbayimeninggalk0403[totjlhbayimeninggalk0403];
						$totjumlahbayimeninggalk0403=number_format($jumlahbayimeninggalk0403,0,",",".");
					echo "$totjumlahbayimeninggalk0403";
 } ?>