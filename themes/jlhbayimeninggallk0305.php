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
	  
		  
$totbayimeninggalk0305 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0305 from kehamilan where kodekel='0305'");
						$jlhtotbayimeninggalk0305=pg_fetch_array($totbayimeninggalk0305); 
						$jumlahbayimeninggalk0305=$jlhtotbayimeninggalk0305[totjlhbayimeninggalk0305];
						$totjumlahbayimeninggalk0305=number_format($jumlahbayimeninggalk0305,0,",",".");
					echo "$totjumlahbayimeninggalk0305";
 } ?>