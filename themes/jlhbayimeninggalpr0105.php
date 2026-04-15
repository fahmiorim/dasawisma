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
	  
		  
$totbayimeninggalp0105 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0105 from kehamilan where kodekel='0105'");
						$jlhtotbayimeninggalp0105=pg_fetch_array($totbayimeninggalp0105); 
						$jumlahbayimeninggalp0105=$jlhtotbayimeninggalp0105[totjlhbayimeninggalp0105];
						$totjumlahbayimeninggalp0105=number_format($jumlahbayimeninggalp0105,0,",",".");
					echo "$totjumlahbayimeninggalp0105";
 } ?>