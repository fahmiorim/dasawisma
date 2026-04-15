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
	  
		  
$totbayimeninggalp0207 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0207 from kehamilan where kodekel='0207'");
						$jlhtotbayimeninggalp0207=pg_fetch_array($totbayimeninggalp0207); 
						$jumlahbayimeninggalp0207=$jlhtotbayimeninggalp0207[totjlhbayimeninggalp0207];
						$totjumlahbayimeninggalp0207=number_format($jumlahbayimeninggalp0207,0,",",".");
					echo "$totjumlahbayimeninggalp0207";
 } ?>