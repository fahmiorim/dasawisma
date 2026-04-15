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
	  
		  
$totbayimeninggalp0405 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0405 from kehamilan where kodekel='0405'");
						$jlhtotbayimeninggalp0405=pg_fetch_array($totbayimeninggalp0405); 
						$jumlahbayimeninggalp0405=$jlhtotbayimeninggalp0405[totjlhbayimeninggalp0405];
						$totjumlahbayimeninggalp0405=number_format($jumlahbayimeninggalp0405,0,",",".");
					echo "$totjumlahbayimeninggalp0405";
 } ?>