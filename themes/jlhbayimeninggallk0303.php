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
	  
		  
$totbayimeninggalk0303 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0303 from kehamilan where kodekel='0303'");
						$jlhtotbayimeninggalk0303=pg_fetch_array($totbayimeninggalk0303); 
						$jumlahbayimeninggalk0303=$jlhtotbayimeninggalk0303[totjlhbayimeninggalk0303];
						$totjumlahbayimeninggalk0303=number_format($jumlahbayimeninggalk0303,0,",",".");
					echo "$totjumlahbayimeninggalk0303";
 } ?>