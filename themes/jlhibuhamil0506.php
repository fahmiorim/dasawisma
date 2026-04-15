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
	  
		  
					$totibuhamil0506 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0506 from kehamilan where kodekel='0506'");
						$jlhtotibuhamil0506=pg_fetch_array($totibuhamil0506); 
						$jumlahibuhamil0506=$jlhtotibuhamil0506[totjlhibuhamil0506];
						$totjumlahibuhamil0506=number_format($jumlahibuhamil0506,0,",",".");
					echo "$totjumlahibuhamil0506";
 } ?>