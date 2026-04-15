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
	  
		  
$totbayimeninggalp0103 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0103 from kehamilan where kodekel='0103'");
						$jlhtotbayimeninggalp0103=pg_fetch_array($totbayimeninggalp0103); 
						$jumlahbayimeninggalp0103=$jlhtotbayimeninggalp0103[totjlhbayimeninggalp0103];
						$totjumlahbayimeninggalp0103=number_format($jumlahbayimeninggalp0103,0,",",".");
					echo "$totjumlahbayimeninggalp0103";
 } ?>