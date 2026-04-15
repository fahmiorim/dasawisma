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
	  
		  
					$totibuhamil0205 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0205 from kehamilan where kodekel='0205'");
						$jlhtotibuhamil0205=pg_fetch_array($totibuhamil0205); 
						$jumlahibuhamil0205=$jlhtotibuhamil0205[totjlhibuhamil0205];
						$totjumlahibuhamil0205=number_format($jumlahibuhamil0205,0,",",".");
					echo "$totjumlahibuhamil0205";
 } ?>