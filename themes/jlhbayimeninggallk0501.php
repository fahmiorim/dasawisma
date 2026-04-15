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
	  
		  
$totbayimeninggalk0501 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0501 from kehamilan where kodekel='0501'");
						$jlhtotbayimeninggalk0501=pg_fetch_array($totbayimeninggalk0501); 
						$jumlahbayimeninggalk0501=$jlhtotbayimeninggalk0501[totjlhbayimeninggalk0501];
						$totjumlahbayimeninggalk0501=number_format($jumlahbayimeninggalk0501,0,",",".");
					echo "$totjumlahbayimeninggalk0501";
 } ?>