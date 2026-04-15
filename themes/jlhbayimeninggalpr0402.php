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
	  
		  
$totbayimeninggalp0402 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0402 from kehamilan where kodekel='0402'");
						$jlhtotbayimeninggalp0402=pg_fetch_array($totbayimeninggalp0402); 
						$jumlahbayimeninggalp0402=$jlhtotbayimeninggalp0402[totjlhbayimeninggalp0402];
						$totjumlahbayimeninggalp0402=number_format($jumlahbayimeninggalp0402,0,",",".");
					echo "$totjumlahbayimeninggalp0402";
 } ?>