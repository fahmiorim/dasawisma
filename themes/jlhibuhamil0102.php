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
	  
		  
					$totibuhamil0102 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0102 from kehamilan where kodekel='0102'");
						$jlhtotibuhamil0102=pg_fetch_array($totibuhamil0102); 
						$jumlahibuhamil0102=$jlhtotibuhamil0102[totjlhibuhamil0102];
						$totjumlahibuhamil0102=number_format($jumlahibuhamil0102,0,",",".");
					echo "$totjumlahibuhamil0102";
 } ?>