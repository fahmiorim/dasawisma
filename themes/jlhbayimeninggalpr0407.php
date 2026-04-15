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
	  
		  
$totbayimeninggalp0407 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0407 from kehamilan where kodekel='0407'");
						$jlhtotbayimeninggalp0407=pg_fetch_array($totbayimeninggalp0407); 
						$jumlahbayimeninggalp0407=$jlhtotbayimeninggalp0407[totjlhbayimeninggalp0407];
						$totjumlahbayimeninggalp0407=number_format($jumlahbayimeninggalp0407,0,",",".");
					echo "$totjumlahbayimeninggalp0407";
 } ?>