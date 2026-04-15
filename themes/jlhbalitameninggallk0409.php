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
	  
		  
$totbalital0409 =pg_query($koneksi, "select sum(balital) as totjlhbalital0409 from kehamilan where kodekel='0409'");
						$jlhtotbalital0409=pg_fetch_array($totbalital0409); 
						$jumlahbalital0409=$jlhtotbalital0409[totjlhbalital0409];
						$totjumlahbalital0409=number_format($jumlahbalital0409,0,",",".");
					echo "$totjumlahbalital0409";
 } ?>