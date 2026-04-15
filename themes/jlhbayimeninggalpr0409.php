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
	  
		  
$totbayimeninggalp0409 =pg_query($koneksi, "select sum(bayimeninggalp) as totjlhbayimeninggalp0409 from kehamilan where kodekel='0409'");
						$jlhtotbayimeninggalp0409=pg_fetch_array($totbayimeninggalp0409); 
						$jumlahbayimeninggalp0409=$jlhtotbayimeninggalp0409[totjlhbayimeninggalp0409];
						$totjumlahbayimeninggalp0409=number_format($jumlahbayimeninggalp0409,0,",",".");
					echo "$totjumlahbayimeninggalp0409";
 } ?>