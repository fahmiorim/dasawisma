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
	  
		  
					$totibuhamil0203 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0203 from kehamilan where kodekel='0203'");
						$jlhtotibuhamil0203=pg_fetch_array($totibuhamil0203); 
						$jumlahibuhamil0203=$jlhtotibuhamil0203[totjlhibuhamil0203];
						$totjumlahibuhamil0203=number_format($jumlahibuhamil0203,0,",",".");
					echo "$totjumlahibuhamil0203";
 } ?>