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
	  
		  
$totbayimeninggalk0105 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0105 from kehamilan where kodekel='0105'");
						$jlhtotbayimeninggalk0105=pg_fetch_array($totbayimeninggalk0105); 
						$jumlahbayimeninggalk0105=$jlhtotbayimeninggalk0105[totjlhbayimeninggalk0105];
						$totjumlahbayimeninggalk0105=number_format($jumlahbayimeninggalk0105,0,",",".");
					echo "$totjumlahbayimeninggalk0105";
 } ?>