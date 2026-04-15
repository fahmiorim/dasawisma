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
	  
		  
					$totibuhamil0302 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0302 from kehamilan where kodekel='0302'");
						$jlhtotibuhamil0302=pg_fetch_array($totibuhamil0302); 
						$jumlahibuhamil0302=$jlhtotibuhamil0302[totjlhibuhamil0302];
						$totjumlahibuhamil0302=number_format($jumlahibuhamil0302,0,",",".");
					echo "$totjumlahibuhamil0302";
 } ?>