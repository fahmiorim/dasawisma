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
	  
		  
$totbayimeninggalp0306 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0306 from kehamilan where kodekel='0306'");
						$jlhtotbayimeninggalp0306=pg_fetch_array($totbayimeninggalp0306); 
						$jumlahbayimeninggalp0306=$jlhtotbayimeninggalp0306[totjlhbayimeninggalp0306];
						$totjumlahbayimeninggalp0306=number_format($jumlahbayimeninggalp0306,0,",",".");
					echo "$totjumlahbayimeninggalp0306";
 } ?>