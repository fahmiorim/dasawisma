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
	  
		  
$totbayimeninggalk0104 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0104 from kehamilan where kodekel='0104'");
						$jlhtotbayimeninggalk0104=pg_fetch_array($totbayimeninggalk0104); 
						$jumlahbayimeninggalk0104=$jlhtotbayimeninggalk0104[totjlhbayimeninggalk0104];
						$totjumlahbayimeninggalk0104=number_format($jumlahbayimeninggalk0104,0,",",".");
					echo "$totjumlahbayimeninggalk0104";
 } ?>