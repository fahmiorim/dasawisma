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
	  
		  
$totbayimeninggalk0304 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0304 from kehamilan where kodekel='0304'");
						$jlhtotbayimeninggalk0304=pg_fetch_array($totbayimeninggalk0304); 
						$jumlahbayimeninggalk0304=$jlhtotbayimeninggalk0304[totjlhbayimeninggalk0304];
						$totjumlahbayimeninggalk0304=number_format($jumlahbayimeninggalk0304,0,",",".");
					echo "$totjumlahbayimeninggalk0304";
 } ?>