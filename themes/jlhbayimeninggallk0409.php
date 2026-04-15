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
	  
		  
$totbayimeninggalk0409 =pg_query($koneksi, "select sum(bayimeninggalk) as totjlhbayimeninggalk0409 from kehamilan where kodekel='0409'");
						$jlhtotbayimeninggalk0409=pg_fetch_array($totbayimeninggalk0409); 
						$jumlahbayimeninggalk0409=$jlhtotbayimeninggalk0409[totjlhbayimeninggalk0409];
						$totjumlahbayimeninggalk0409=number_format($jumlahbayimeninggalk0409,0,",",".");
					echo "$totjumlahbayimeninggalk0409";
 } ?>