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
	  
		  
$totbayimeninggalp0201 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0201 from kehamilan where kodekel='0201'");
						$jlhtotbayimeninggalp0201=pg_fetch_array($totbayimeninggalp0201); 
						$jumlahbayimeninggalp0201=$jlhtotbayimeninggalp0201[totjlhbayimeninggalp0201];
						$totjumlahbayimeninggalp0201=number_format($jumlahbayimeninggalp0201,0,",",".");
					echo "$totjumlahbayimeninggalp0201";
 } ?>