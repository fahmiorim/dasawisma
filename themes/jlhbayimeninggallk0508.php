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
	  
		  
$totbayimeninggalk0508 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0508 from kehamilan where kodekel='0508'");
						$jlhtotbayimeninggalk0508=pg_fetch_array($totbayimeninggalk0508); 
						$jumlahbayimeninggalk0508=$jlhtotbayimeninggalk0508[totjlhbayimeninggalk0508];
						$totjumlahbayimeninggalk0508=number_format($jumlahbayimeninggalk0508,0,",",".");
					echo "$totjumlahbayimeninggalk0508";
 } ?>