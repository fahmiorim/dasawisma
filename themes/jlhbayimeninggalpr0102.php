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
	  
		  
$totbayimeninggalp0102 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0102 from kehamilan where kodekel='0102'");
						$jlhtotbayimeninggalp0102=pg_fetch_array($totbayimeninggalp0102); 
						$jumlahbayimeninggalp0102=$jlhtotbayimeninggalp0102[totjlhbayimeninggalp0102];
						$totjumlahbayimeninggalp0102=number_format($jumlahbayimeninggalp0102,0,",",".");
					echo "$totjumlahbayimeninggalp0102";
 } ?>