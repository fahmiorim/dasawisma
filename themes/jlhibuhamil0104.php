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
	  
		  
					$totibuhamil0104 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0104 from kehamilan where kodekel='0104'");
						$jlhtotibuhamil0104=pg_fetch_array($totibuhamil0104); 
						$jumlahibuhamil0104=$jlhtotibuhamil0104[totjlhibuhamil0104];
						$totjumlahibuhamil0104=number_format($jumlahibuhamil0104,0,",",".");
					echo "$totjumlahibuhamil0104";
 } ?>