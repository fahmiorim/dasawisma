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
	  
		  
$totbayimeninggalk0306 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0306 from kehamilan where kodekel='0306'");
						$jlhtotbayimeninggalk0306=pg_fetch_array($totbayimeninggalk0306); 
						$jumlahbayimeninggalk0306=$jlhtotbayimeninggalk0306[totjlhbayimeninggalk0306];
						$totjumlahbayimeninggalk0306=number_format($jumlahbayimeninggalk0306,0,",",".");
					echo "$totjumlahbayimeninggalk0306";
 } ?>