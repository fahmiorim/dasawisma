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
	  
		  
					$totibuhamil0405 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0405 from kehamilan where kodekel='0405'");
						$jlhtotibuhamil0405=pg_fetch_array($totibuhamil0405); 
						$jumlahibuhamil0405=$jlhtotibuhamil0405[totjlhibuhamil0405];
						$totjumlahibuhamil0405=number_format($jumlahibuhamil0405,0,",",".");
					echo "$totjumlahibuhamil0405";
 } ?>