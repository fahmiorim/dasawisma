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
	  
		  
$totbayimeninggalp0408 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0408 from kehamilan where kodekel='0408'");
						$jlhtotbayimeninggalp0408=pg_fetch_array($totbayimeninggalp0408); 
						$jumlahbayimeninggalp0408=$jlhtotbayimeninggalp0408[totjlhbayimeninggalp0408];
						$totjumlahbayimeninggalp0408=number_format($jumlahbayimeninggalp0408,0,",",".");
					echo "$totjumlahbayimeninggalp0408";
 } ?>