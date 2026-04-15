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
	  
		  
$totbayimeninggalk0206 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0206 from kehamilan where kodekel='0206'");
						$jlhtotbayimeninggalk0206=pg_fetch_array($totbayimeninggalk0206); 
						$jumlahbayimeninggalk0206=$jlhtotbayimeninggalk0206[totjlhbayimeninggalk0206];
						$totjumlahbayimeninggalk0206=number_format($jumlahbayimeninggalk0206,0,",",".");
					echo "$totjumlahbayimeninggalk0206";
 } ?>