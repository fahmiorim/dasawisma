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
	  
		  
$totbayimeninggalk0203 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0203 from kehamilan where kodekel='0203'");
						$jlhtotbayimeninggalk0203=pg_fetch_array($totbayimeninggalk0203); 
						$jumlahbayimeninggalk0203=$jlhtotbayimeninggalk0203[totjlhbayimeninggalk0203];
						$totjumlahbayimeninggalk0203=number_format($jumlahbayimeninggalk0203,0,",",".");
					echo "$totjumlahbayimeninggalk0203";
 } ?>