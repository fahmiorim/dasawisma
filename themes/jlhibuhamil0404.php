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
	  
		  
					$totibuhamil0404 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0404 from kehamilan where kodekel='0404'");
						$jlhtotibuhamil0404=pg_fetch_array($totibuhamil0404); 
						$jumlahibuhamil0404=$jlhtotibuhamil0404[totjlhibuhamil0404];
						$totjumlahibuhamil0404=number_format($jumlahibuhamil0404,0,",",".");
					echo "$totjumlahibuhamil0404";
 } ?>