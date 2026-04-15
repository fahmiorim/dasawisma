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
	  
		  
					$totibuhamil0207 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0207 from kehamilan where kodekel='0207'");
						$jlhtotibuhamil0207=pg_fetch_array($totibuhamil0207); 
						$jumlahibuhamil0207=$jlhtotibuhamil0207[totjlhibuhamil0207];
						$totjumlahibuhamil0207=number_format($jumlahibuhamil0207,0,",",".");
					echo "$totjumlahibuhamil0207";
 } ?>