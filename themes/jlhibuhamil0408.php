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
	  
		  
					$totibuhamil0408 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0408 from kehamilan where kodekel='0408'");
						$jlhtotibuhamil0408=pg_fetch_array($totibuhamil0408); 
						$jumlahibuhamil0408=$jlhtotibuhamil0408[totjlhibuhamil0408];
						$totjumlahibuhamil0408=number_format($jumlahibuhamil0408,0,",",".");
					echo "$totjumlahibuhamil0408";
 } ?>