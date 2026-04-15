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
	  
		  
$totbayimeninggalk0106 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0106 from kehamilan where kodekel='0106'");
						$jlhtotbayimeninggalk0106=pg_fetch_array($totbayimeninggalk0106); 
						$jumlahbayimeninggalk0106=$jlhtotbayimeninggalk0106[totjlhbayimeninggalk0106];
						$totjumlahbayimeninggalk0106=number_format($jumlahbayimeninggalk0106,0,",",".");
					echo "$totjumlahbayimeninggalk0106";
 } ?>