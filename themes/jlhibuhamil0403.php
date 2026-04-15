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
	  
		  
					$totibuhamil0403 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0403 from kehamilan where kodekel='0403'");
						$jlhtotibuhamil0403=pg_fetch_array($totibuhamil0403); 
						$jumlahibuhamil0403=$jlhtotibuhamil0403[totjlhibuhamil0403];
						$totjumlahibuhamil0403=number_format($jumlahibuhamil0403,0,",",".");
					echo "$totjumlahibuhamil0403";
 } ?>