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
	  
		  
$totbayimeninggalk0402 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0402 from kehamilan where kodekel='0402'");
						$jlhtotbayimeninggalk0402=pg_fetch_array($totbayimeninggalk0402); 
						$jumlahbayimeninggalk0402=$jlhtotbayimeninggalk0402[totjlhbayimeninggalk0402];
						$totjumlahbayimeninggalk0402=number_format($jumlahbayimeninggalk0402,0,",",".");
					echo "$totjumlahbayimeninggalk0402";
 } ?>