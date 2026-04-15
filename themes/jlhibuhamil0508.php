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
	  
		  
					$totibuhamil0508 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0508 from kehamilan where kodekel='0508'");
						$jlhtotibuhamil0508=pg_fetch_array($totibuhamil0508); 
						$jumlahibuhamil0508=$jlhtotibuhamil0508[totjlhibuhamil0508];
						$totjumlahibuhamil0508=number_format($jumlahibuhamil0508,0,",",".");
					echo "$totjumlahibuhamil0508";
 } ?>