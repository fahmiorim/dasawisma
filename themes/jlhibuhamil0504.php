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
	  
		  
					$totibuhamil0504 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0504 from kehamilan where kodekel='0504'");
						$jlhtotibuhamil0504=pg_fetch_array($totibuhamil0504); 
						$jumlahibuhamil0504=$jlhtotibuhamil0504[totjlhibuhamil0504];
						$totjumlahibuhamil0504=number_format($jumlahibuhamil0504,0,",",".");
					echo "$totjumlahibuhamil0504";
 } ?>