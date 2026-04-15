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
	  
		  
$totbayimeninggalk0201 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0201 from kehamilan where kodekel='0201'");
						$jlhtotbayimeninggalk0201=pg_fetch_array($totbayimeninggalk0201); 
						$jumlahbayimeninggalk0201=$jlhtotbayimeninggalk0201[totjlhbayimeninggalk0201];
						$totjumlahbayimeninggalk0201=number_format($jumlahbayimeninggalk0201,0,",",".");
					echo "$totjumlahbayimeninggalk0201";
 } ?>