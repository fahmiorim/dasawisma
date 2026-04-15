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
	  
		  
$totbayimeninggalp0206 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0206 from kehamilan where kodekel='0206'");
						$jlhtotbayimeninggalp0206=pg_fetch_array($totbayimeninggalp0206); 
						$jumlahbayimeninggalp0206=$jlhtotbayimeninggalp0206[totjlhbayimeninggalp0206];
						$totjumlahbayimeninggalp0206=number_format($jumlahbayimeninggalp0206,0,",",".");
					echo "$totjumlahbayimeninggalp0206";
 } ?>