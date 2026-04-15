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
	  
		  
$totbayimeninggalk0401 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0401 from kehamilan where kodekel='0401'");
						$jlhtotbayimeninggalk0401=pg_fetch_array($totbayimeninggalk0401); 
						$jumlahbayimeninggalk0401=$jlhtotbayimeninggalk0401[totjlhbayimeninggalk0401];
						$totjumlahbayimeninggalk0401=number_format($jumlahbayimeninggalk0401,0,",",".");
					echo "$totjumlahbayimeninggalk0401";
 } ?>