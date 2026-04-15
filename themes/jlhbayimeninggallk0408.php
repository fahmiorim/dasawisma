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
	  
		  
$totbayimeninggalk0408 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0408 from kehamilan where kodekel='0408'");
						$jlhtotbayimeninggalk0408=pg_fetch_array($totbayimeninggalk0408); 
						$jumlahbayimeninggalk0408=$jlhtotbayimeninggalk0408[totjlhbayimeninggalk0408];
						$totjumlahbayimeninggalk0408=number_format($jumlahbayimeninggalk0408,0,",",".");
					echo "$totjumlahbayimeninggalk0408";
 } ?>