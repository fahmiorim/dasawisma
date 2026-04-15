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
	  
		  
$totbayimeninggalp0503 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0503 from kehamilan where kodekel='0503'");
						$jlhtotbayimeninggalp0503=pg_fetch_array($totbayimeninggalp0503); 
						$jumlahbayimeninggalp0503=$jlhtotbayimeninggalp0503[totjlhbayimeninggalp0503];
						$totjumlahbayimeninggalp0503=number_format($jumlahbayimeninggalp0503,0,",",".");
					echo "$totjumlahbayimeninggalp0503";
 } ?>