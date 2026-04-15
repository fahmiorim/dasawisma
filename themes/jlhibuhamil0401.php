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
	  
		  
					$totibuhamil0401 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0401 from kehamilan where kodekel='0401'");
						$jlhtotibuhamil0401=pg_fetch_array($totibuhamil0401); 
						$jumlahibuhamil0401=$jlhtotibuhamil0401[totjlhibuhamil0401];
						$totjumlahibuhamil0401=number_format($jumlahibuhamil0401,0,",",".");
					echo "$totjumlahibuhamil0401";
 } ?>