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
	  
		  
					$totibuhamil0507 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0507 from kehamilan where kodekel='0507'");
						$jlhtotibuhamil0507=pg_fetch_array($totibuhamil0507); 
						$jumlahibuhamil0507=$jlhtotibuhamil0507[totjlhibuhamil0507];
						$totjumlahibuhamil0507=number_format($jumlahibuhamil0507,0,",",".");
					echo "$totjumlahibuhamil0507";
 } ?>