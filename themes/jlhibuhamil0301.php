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
	  
		  
					$totibuhamil0301 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0301 from kehamilan where kodekel='0301'");
						$jlhtotibuhamil0301=pg_fetch_array($totibuhamil0301); 
						$jumlahibuhamil0301=$jlhtotibuhamil0301[totjlhibuhamil0301];
						$totjumlahibuhamil0301=number_format($jumlahibuhamil0301,0,",",".");
					echo "$totjumlahibuhamil0301";
 } ?>