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
	  
		  
$totbayimeninggalp0507 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0507 from kehamilan where kodekel='0507'");
						$jlhtotbayimeninggalp0507=pg_fetch_array($totbayimeninggalp0507); 
						$jumlahbayimeninggalp0507=$jlhtotbayimeninggalp0507[totjlhbayimeninggalp0507];
						$totjumlahbayimeninggalp0507=number_format($jumlahbayimeninggalp0507,0,",",".");
					echo "$totjumlahbayimeninggalp0507";
 } ?>