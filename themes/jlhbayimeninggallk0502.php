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
	  
		  
$totbayimeninggalk0502 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0502 from kehamilan where kodekel='0502'");
						$jlhtotbayimeninggalk0502=pg_fetch_array($totbayimeninggalk0502); 
						$jumlahbayimeninggalk0502=$jlhtotbayimeninggalk0502[totjlhbayimeninggalk0502];
						$totjumlahbayimeninggalk0502=number_format($jumlahbayimeninggalk0502,0,",",".");
					echo "$totjumlahbayimeninggalk0502";
 } ?>