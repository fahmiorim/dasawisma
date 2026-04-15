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
	  
		  
$totbayimeninggalk0204 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0204 from kehamilan where kodekel='0204'");
						$jlhtotbayimeninggalk0204=pg_fetch_array($totbayimeninggalk0204); 
						$jumlahbayimeninggalk0204=$jlhtotbayimeninggalk0204[totjlhbayimeninggalk0204];
						$totjumlahbayimeninggalk0204=number_format($jumlahbayimeninggalk0204,0,",",".");
					echo "$totjumlahbayimeninggalk0204";
 } ?>