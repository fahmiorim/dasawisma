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
	  
		  
$totbayimeninggalp0104 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0104 from kehamilan where kodekel='0104'");
						$jlhtotbayimeninggalp0104=pg_fetch_array($totbayimeninggalp0104); 
						$jumlahbayimeninggalp0104=$jlhtotbayimeninggalp0104[totjlhbayimeninggalp0104];
						$totjumlahbayimeninggalp0104=number_format($jumlahbayimeninggalp0104,0,",",".");
					echo "$totjumlahbayimeninggalp0104";
 } ?>