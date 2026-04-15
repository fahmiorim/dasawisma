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
	  
		  
					$totibuhamil0106 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0106 from kehamilan where kodekel='0106'");
						$jlhtotibuhamil0106=pg_fetch_array($totibuhamil0106); 
						$jumlahibuhamil0106=$jlhtotibuhamil0106[totjlhibuhamil0106];
						$totjumlahibuhamil0106=number_format($jumlahibuhamil0106,0,",",".");
					echo "$totjumlahibuhamil0106";
 } ?>