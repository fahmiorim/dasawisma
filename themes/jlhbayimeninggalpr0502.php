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
	  
		  
$totbayimeninggalp0502 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0502 from kehamilan where kodekel='0502'");
						$jlhtotbayimeninggalp0502=pg_fetch_array($totbayimeninggalp0502); 
						$jumlahbayimeninggalp0502=$jlhtotbayimeninggalp0502[totjlhbayimeninggalp0502];
						$totjumlahbayimeninggalp0502=number_format($jumlahbayimeninggalp0502,0,",",".");
					echo "$totjumlahbayimeninggalp0502";
 } ?>