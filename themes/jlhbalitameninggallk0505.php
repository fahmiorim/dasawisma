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
	  
		  
$totbalital0505 =pg_query($koneksi, "select sum(balital) as totjlhbalital0505 from kehamilan where kodekel='0505'");
						$jlhtotbalital0505=pg_fetch_array($totbalital0505); 
						$jumlahbalital0505=$jlhtotbalital0505[totjlhbalital0505];
						$totjumlahbalital0505=number_format($jumlahbalital0505,0,",",".");
					echo "$totjumlahbalital0505";
 } ?>