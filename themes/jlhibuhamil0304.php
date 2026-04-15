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
	  
		  
					$totibuhamil0304 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0304 from kehamilan where kodekel='0304'");
						$jlhtotibuhamil0304=pg_fetch_array($totibuhamil0304); 
						$jumlahibuhamil0304=$jlhtotibuhamil0304[totjlhibuhamil0304];
						$totjumlahibuhamil0304=number_format($jumlahibuhamil0304,0,",",".");
					echo "$totjumlahibuhamil0304";
 } ?>