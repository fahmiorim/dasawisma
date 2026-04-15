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
	  
		  
$totbayimeninggalp0303 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0303 from kehamilan where kodekel='0303'");
						$jlhtotbayimeninggalp0303=pg_fetch_array($totbayimeninggalp0303); 
						$jumlahbayimeninggalp0303=$jlhtotbayimeninggalp0303[totjlhbayimeninggalp0303];
						$totjumlahbayimeninggalp0303=number_format($jumlahbayimeninggalp0303,0,",",".");
					echo "$totjumlahbayimeninggalp0303";
 } ?>