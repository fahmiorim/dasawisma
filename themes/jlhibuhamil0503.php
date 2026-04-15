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
	  
		  
					$totibuhamil0503 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0503 from kehamilan where kodekel='0503'");
						$jlhtotibuhamil0503=pg_fetch_array($totibuhamil0503); 
						$jumlahibuhamil0503=$jlhtotibuhamil0503[totjlhibuhamil0503];
						$totjumlahibuhamil0503=number_format($jumlahibuhamil0503,0,",",".");
					echo "$totjumlahibuhamil0503";
 } ?>