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
	  
		  
					$totibuhamil0306 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0306 from kehamilan where kodekel='0306'");
						$jlhtotibuhamil0306=pg_fetch_array($totibuhamil0306); 
						$jumlahibuhamil0306=$jlhtotibuhamil0306[totjlhibuhamil0306];
						$totjumlahibuhamil0306=number_format($jumlahibuhamil0306,0,",",".");
					echo "$totjumlahibuhamil0306";
 } ?>