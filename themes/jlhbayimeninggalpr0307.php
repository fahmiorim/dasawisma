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
	  
		  
$totbayimeninggalp0307 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0307 from kehamilan where kodekel='0307'");
						$jlhtotbayimeninggalp0307=pg_fetch_array($totbayimeninggalp0307); 
						$jumlahbayimeninggalp0307=$jlhtotbayimeninggalp0307[totjlhbayimeninggalp0307];
						$totjumlahbayimeninggalp0307=number_format($jumlahbayimeninggalp0307,0,",",".");
					echo "$totjumlahbayimeninggalp0307";
 } ?>