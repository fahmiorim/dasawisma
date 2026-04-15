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
	  
		  
$totbayimeninggalp0106 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0106 from kehamilan where kodekel='0106'");
						$jlhtotbayimeninggalp0106=pg_fetch_array($totbayimeninggalp0106); 
						$jumlahbayimeninggalp0106=$jlhtotbayimeninggalp0106[totjlhbayimeninggalp0106];
						$totjumlahbayimeninggalp0106=number_format($jumlahbayimeninggalp0106,0,",",".");
					echo "$totjumlahbayimeninggalp0106";
 } ?>