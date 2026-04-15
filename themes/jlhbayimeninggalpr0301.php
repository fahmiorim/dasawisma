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
	  
		  
$totbayimeninggalp0301 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0301 from kehamilan where kodekel='0301'");
						$jlhtotbayimeninggalp0301=pg_fetch_array($totbayimeninggalp0301); 
						$jumlahbayimeninggalp0301=$jlhtotbayimeninggalp0301[totjlhbayimeninggalp0301];
						$totjumlahbayimeninggalp0301=number_format($jumlahbayimeninggalp0301,0,",",".");
					echo "$totjumlahbayimeninggalp0301";
 } ?>