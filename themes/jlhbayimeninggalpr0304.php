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
	  
		  
$totbayimeninggalp0304 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0304 from kehamilan where kodekel='0304'");
						$jlhtotbayimeninggalp0304=pg_fetch_array($totbayimeninggalp0304); 
						$jumlahbayimeninggalp0304=$jlhtotbayimeninggalp0304[totjlhbayimeninggalp0304];
						$totjumlahbayimeninggalp0304=number_format($jumlahbayimeninggalp0304,0,",",".");
					echo "$totjumlahbayimeninggalp0304";
 } ?>