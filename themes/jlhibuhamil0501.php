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
	  
		  
					$totibuhamil0501 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0501 from kehamilan where kodekel='0501'");
						$jlhtotibuhamil0501=pg_fetch_array($totibuhamil0501); 
						$jumlahibuhamil0501=$jlhtotibuhamil0501[totjlhibuhamil0501];
						$totjumlahibuhamil0501=number_format($jumlahibuhamil0501,0,",",".");
					echo "$totjumlahibuhamil0501";
 } ?>