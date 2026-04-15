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
	  
		  
					$totibuhamil0303 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0303 from kehamilan where kodekel='0303'");
						$jlhtotibuhamil0303=pg_fetch_array($totibuhamil0303); 
						$jumlahibuhamil0303=$jlhtotibuhamil0303[totjlhibuhamil0303];
						$totjumlahibuhamil0303=number_format($jumlahibuhamil0303,0,",",".");
					echo "$totjumlahibuhamil0303";
 } ?>