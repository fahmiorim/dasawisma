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
	  
		  
$totbayimeninggalp0406 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0406 from kehamilan where kodekel='0406'");
						$jlhtotbayimeninggalp0406=pg_fetch_array($totbayimeninggalp0406); 
						$jumlahbayimeninggalp0406=$jlhtotbayimeninggalp0406[totjlhbayimeninggalp0406];
						$totjumlahbayimeninggalp0406=number_format($jumlahbayimeninggalp0406,0,",",".");
					echo "$totjumlahbayimeninggalp0406";
 } ?>