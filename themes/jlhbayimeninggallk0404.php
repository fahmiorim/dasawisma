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
	  
		  
$totbayimeninggalk0404 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0404 from kehamilan where kodekel='0404'");
						$jlhtotbayimeninggalk0404=pg_fetch_array($totbayimeninggalk0404); 
						$jumlahbayimeninggalk0404=$jlhtotbayimeninggalk0404[totjlhbayimeninggalk0404];
						$totjumlahbayimeninggalk0404=number_format($jumlahbayimeninggalk0404,0,",",".");
					echo "$totjumlahbayimeninggalk0404";
 } ?>