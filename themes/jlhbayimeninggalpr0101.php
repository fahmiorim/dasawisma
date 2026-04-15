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
	  
		  
$totbayimeninggalp0101 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0101 from kehamilan where kodekel='0101'");
						$jlhtotbayimeninggalp0101=pg_fetch_array($totbayimeninggalp0101); 
						$jumlahbayimeninggalp0101=$jlhtotbayimeninggalp0101[totjlhbayimeninggalp0101];
						$totjumlahbayimeninggalp0101=number_format($jumlahbayimeninggalp0101,0,",",".");
					echo "$totjumlahbayimeninggalp0101";
 } ?>