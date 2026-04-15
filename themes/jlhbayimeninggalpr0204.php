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
	  
		  
$totbayimeninggalp0204 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0204 from kehamilan where kodekel='0204'");
						$jlhtotbayimeninggalp0204=pg_fetch_array($totbayimeninggalp0204); 
						$jumlahbayimeninggalp0204=$jlhtotbayimeninggalp0204[totjlhbayimeninggalp0204];
						$totjumlahbayimeninggalp0204=number_format($jumlahbayimeninggalp0204,0,",",".");
					echo "$totjumlahbayimeninggalp0204";
 } ?>