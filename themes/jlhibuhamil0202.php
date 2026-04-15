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
	  
		  
					$totibuhamil0202 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0202 from kehamilan where kodekel='0202'");
						$jlhtotibuhamil0202=pg_fetch_array($totibuhamil0202); 
						$jumlahibuhamil0202=$jlhtotibuhamil0202[totjlhibuhamil0202];
						$totjumlahibuhamil0202=number_format($jumlahibuhamil0202,0,",",".");
					echo "$totjumlahibuhamil0202";
 } ?>