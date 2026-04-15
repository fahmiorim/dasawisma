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
	  
		  
$totbayimeninggalk0101 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0101 from kehamilan where kodekel='0101'");
						$jlhtotbayimeninggalk0101=pg_fetch_array($totbayimeninggalk0101); 
						$jumlahbayimeninggalk0101=$jlhtotbayimeninggalk0101[totjlhbayimeninggalk0101];
						$totjumlahbayimeninggalk0101=number_format($jumlahbayimeninggalk0101,0,",",".");
					echo "$totjumlahbayimeninggalk0101";
 } ?>