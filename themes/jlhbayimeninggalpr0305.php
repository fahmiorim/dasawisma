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
	  
		  
$totbayimeninggalp0305 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0305 from kehamilan where kodekel='0305'");
						$jlhtotbayimeninggalp0305=pg_fetch_array($totbayimeninggalp0305); 
						$jumlahbayimeninggalp0305=$jlhtotbayimeninggalp0305[totjlhbayimeninggalp0305];
						$totjumlahbayimeninggalp0305=number_format($jumlahbayimeninggalp0305,0,",",".");
					echo "$totjumlahbayimeninggalp0305";
 } ?>