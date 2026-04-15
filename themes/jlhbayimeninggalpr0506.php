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
	  
		  
$totbayimeninggalp0506 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0506 from kehamilan where kodekel='0506'");
						$jlhtotbayimeninggalp0506=pg_fetch_array($totbayimeninggalp0506); 
						$jumlahbayimeninggalp0506=$jlhtotbayimeninggalp0506[totjlhbayimeninggalp0506];
						$totjumlahbayimeninggalp0506=number_format($jumlahbayimeninggalp0506,0,",",".");
					echo "$totjumlahbayimeninggalp0506";
 } ?>