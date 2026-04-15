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
	  
		  
$totbayimeninggalp0202 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0202 from kehamilan where kodekel='0202'");
						$jlhtotbayimeninggalp0202=pg_fetch_array($totbayimeninggalp0202); 
						$jumlahbayimeninggalp0202=$jlhtotbayimeninggalp0202[totjlhbayimeninggalp0202];
						$totjumlahbayimeninggalp0202=number_format($jumlahbayimeninggalp0202,0,",",".");
					echo "$totjumlahbayimeninggalp0202";
 } ?>