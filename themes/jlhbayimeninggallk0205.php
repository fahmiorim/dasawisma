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
	  
		  
$totbayimeninggalk0205 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0205 from kehamilan where kodekel='0205'");
						$jlhtotbayimeninggalk0205=pg_fetch_array($totbayimeninggalk0205); 
						$jumlahbayimeninggalk0205=$jlhtotbayimeninggalk0205[totjlhbayimeninggalk0205];
						$totjumlahbayimeninggalk0205=number_format($jumlahbayimeninggalk0205,0,",",".");
					echo "$totjumlahbayimeninggalk0205";
 } ?>