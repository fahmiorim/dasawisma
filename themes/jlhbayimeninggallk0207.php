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
	  
		  
$totbayimeninggalk0207 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0207 from kehamilan where kodekel='0207'");
						$jlhtotbayimeninggalk0207=pg_fetch_array($totbayimeninggalk0207); 
						$jumlahbayimeninggalk0207=$jlhtotbayimeninggalk0207[totjlhbayimeninggalk0207];
						$totjumlahbayimeninggalk0207=number_format($jumlahbayimeninggalk0207,0,",",".");
					echo "$totjumlahbayimeninggalk0207";
 } ?>