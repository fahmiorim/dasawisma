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
	  
		  
$totbayimeninggalp0302 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0302 from kehamilan where kodekel='0302'");
						$jlhtotbayimeninggalp0302=pg_fetch_array($totbayimeninggalp0302); 
						$jumlahbayimeninggalp0302=$jlhtotbayimeninggalp0302[totjlhbayimeninggalp0302];
						$totjumlahbayimeninggalp0302=number_format($jumlahbayimeninggalp0302,0,",",".");
					echo "$totjumlahbayimeninggalp0302";
 } ?>