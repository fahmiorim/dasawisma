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
	  
		  
$totbayimeninggalp0205 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0205 from kehamilan where kodekel='0205'");
						$jlhtotbayimeninggalp0205=pg_fetch_array($totbayimeninggalp0205); 
						$jumlahbayimeninggalp0205=$jlhtotbayimeninggalp0205[totjlhbayimeninggalp0205];
						$totjumlahbayimeninggalp0205=number_format($jumlahbayimeninggalp0205,0,",",".");
					echo "$totjumlahbayimeninggalp0205";
 } ?>