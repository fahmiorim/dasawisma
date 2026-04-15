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
	  
		  
$totbayimeninggalp0401 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0401 from kehamilan where kodekel='0401'");
						$jlhtotbayimeninggalp0401=pg_fetch_array($totbayimeninggalp0401); 
						$jumlahbayimeninggalp0401=$jlhtotbayimeninggalp0401[totjlhbayimeninggalp0401];
						$totjumlahbayimeninggalp0401=number_format($jumlahbayimeninggalp0401,0,",",".");
					echo "$totjumlahbayimeninggalp0401";
 } ?>