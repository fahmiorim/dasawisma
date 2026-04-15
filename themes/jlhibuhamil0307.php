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
	  
		  
					$totibuhamil0307 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0307 from kehamilan where kodekel='0307'");
						$jlhtotibuhamil0307=pg_fetch_array($totibuhamil0307); 
						$jumlahibuhamil0307=$jlhtotibuhamil0307[totjlhibuhamil0307];
						$totjumlahibuhamil0307=number_format($jumlahibuhamil0307,0,",",".");
					echo "$totjumlahibuhamil0307";
 } ?>