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
	  
		  
$totbayimeninggalp0403 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0403 from kehamilan where kodekel='0403'");
						$jlhtotbayimeninggalp0403=pg_fetch_array($totbayimeninggalp0403); 
						$jumlahbayimeninggalp0403=$jlhtotbayimeninggalp0403[totjlhbayimeninggalp0403];
						$totjumlahbayimeninggalp0403=number_format($jumlahbayimeninggalp0403,0,",",".");
					echo "$totjumlahbayimeninggalp0403";
 } ?>