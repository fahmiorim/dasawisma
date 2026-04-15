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
	  
		  
$totbayimeninggalk0103 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0103 from kehamilan where kodekel='0103'");
						$jlhtotbayimeninggalk0103=pg_fetch_array($totbayimeninggalk0103); 
						$jumlahbayimeninggalk0103=$jlhtotbayimeninggalk0103[totjlhbayimeninggalk0103];
						$totjumlahbayimeninggalk0103=number_format($jumlahbayimeninggalk0103,0,",",".");
					echo "$totjumlahbayimeninggalk0103";
 } ?>