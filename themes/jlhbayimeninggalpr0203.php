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
	  
		  
$totbayimeninggalp0203 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0203 from kehamilan where kodekel='0203'");
						$jlhtotbayimeninggalp0203=pg_fetch_array($totbayimeninggalp0203); 
						$jumlahbayimeninggalp0203=$jlhtotbayimeninggalp0203[totjlhbayimeninggalp0203];
						$totjumlahbayimeninggalp0203=number_format($jumlahbayimeninggalp0203,0,",",".");
					echo "$totjumlahbayimeninggalp0203";
 } ?>