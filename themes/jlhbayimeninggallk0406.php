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
	  
		  
$totbayimeninggalk0406 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0406 from kehamilan where kodekel='0406'");
						$jlhtotbayimeninggalk0406=pg_fetch_array($totbayimeninggalk0406); 
						$jumlahbayimeninggalk0406=$jlhtotbayimeninggalk0406[totjlhbayimeninggalk0406];
						$totjumlahbayimeninggalk0406=number_format($jumlahbayimeninggalk0406,0,",",".");
					echo "$totjumlahbayimeninggalk0406";
 } ?>