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
	  
		  
$totbayimeninggalp0505 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0505 from kehamilan where kodekel='0505'");
						$jlhtotbayimeninggalp0505=pg_fetch_array($totbayimeninggalp0505); 
						$jumlahbayimeninggalp0505=$jlhtotbayimeninggalp0505[totjlhbayimeninggalp0505];
						$totjumlahbayimeninggalp0505=number_format($jumlahbayimeninggalp0505,0,",",".");
					echo "$totjumlahbayimeninggalp0505";
 } ?>