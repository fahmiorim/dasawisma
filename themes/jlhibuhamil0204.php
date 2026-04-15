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
	  
		  
					$totibuhamil0204 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0204 from kehamilan where kodekel='0204'");
						$jlhtotibuhamil0204=pg_fetch_array($totibuhamil0204); 
						$jumlahibuhamil0204=$jlhtotibuhamil0204[totjlhibuhamil0204];
						$totjumlahibuhamil0204=number_format($jumlahibuhamil0204,0,",",".");
					echo "$totjumlahibuhamil0204";
 } ?>