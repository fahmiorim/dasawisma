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
	  
		  
$totbayimeninggalp0404 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0404 from kehamilan where kodekel='0404'");
						$jlhtotbayimeninggalp0404=pg_fetch_array($totbayimeninggalp0404); 
						$jumlahbayimeninggalp0404=$jlhtotbayimeninggalp0404[totjlhbayimeninggalp0404];
						$totjumlahbayimeninggalp0404=number_format($jumlahbayimeninggalp0404,0,",",".");
					echo "$totjumlahbayimeninggalp0404";
 } ?>