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
	  
		  
$totbayimeninggalp0501 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0501 from kehamilan where kodekel='0501'");
						$jlhtotbayimeninggalp0501=pg_fetch_array($totbayimeninggalp0501); 
						$jumlahbayimeninggalp0501=$jlhtotbayimeninggalp0501[totjlhbayimeninggalp0501];
						$totjumlahbayimeninggalp0501=number_format($jumlahbayimeninggalp0501,0,",",".");
					echo "$totjumlahbayimeninggalp0501";
 } ?>