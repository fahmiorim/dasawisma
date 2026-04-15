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
	  
		  
					$totibuhamil0206 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0206 from kehamilan where kodekel='0206'");
						$jlhtotibuhamil0206=pg_fetch_array($totibuhamil0206); 
						$jumlahibuhamil0206=$jlhtotibuhamil0206[totjlhibuhamil0206];
						$totjumlahibuhamil0206=number_format($jumlahibuhamil0206,0,",",".");
					echo "$totjumlahibuhamil0206";
 } ?>