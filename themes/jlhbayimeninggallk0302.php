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
	  
		  
$totbayimeninggalk0302 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0302 from kehamilan where kodekel='0302'");
						$jlhtotbayimeninggalk0302=pg_fetch_array($totbayimeninggalk0302); 
						$jumlahbayimeninggalk0302=$jlhtotbayimeninggalk0302[totjlhbayimeninggalk0302];
						$totjumlahbayimeninggalk0302=number_format($jumlahbayimeninggalk0302,0,",",".");
					echo "$totjumlahbayimeninggalk0302";
 } ?>