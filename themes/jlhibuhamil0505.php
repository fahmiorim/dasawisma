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
	  
		  
					$totibuhamil0505 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0505 from kehamilan where kodekel='0505'");
						$jlhtotibuhamil0505=pg_fetch_array($totibuhamil0505); 
						$jumlahibuhamil0505=$jlhtotibuhamil0505[totjlhibuhamil0505];
						$totjumlahibuhamil0505=number_format($jumlahibuhamil0505,0,",",".");
					echo "$totjumlahibuhamil0505";
 } ?>