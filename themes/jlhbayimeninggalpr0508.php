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
	  
		  
$totbayimeninggalp0508 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0508 from kehamilan where kodekel='0508'");
						$jlhtotbayimeninggalp0508=pg_fetch_array($totbayimeninggalp0508); 
						$jumlahbayimeninggalp0508=$jlhtotbayimeninggalp0508[totjlhbayimeninggalp0508];
						$totjumlahbayimeninggalp0508=number_format($jumlahbayimeninggalp0508,0,",",".");
					echo "$totjumlahbayimeninggalp0508";
 } ?>