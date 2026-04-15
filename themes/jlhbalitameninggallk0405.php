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
	  
		  
$totbalital0405 =pg_query($koneksi, "select sum(balital) as totjlhbalital0405 from kehamilan where kodekel='0405'");
						$jlhtotbalital0405=pg_fetch_array($totbalital0405); 
						$jumlahbalital0405=$jlhtotbalital0405[totjlhbalital0405];
						$totjumlahbalital0405=number_format($jumlahbalital0405,0,",",".");
					echo "$totjumlahbalital0405";
 } ?>