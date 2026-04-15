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
	  
		  
					$totibuhamil0201 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0201 from kehamilan where kodekel='0201'");
						$jlhtotibuhamil0201=pg_fetch_array($totibuhamil0201); 
						$jumlahibuhamil0201=$jlhtotibuhamil0201[totjlhibuhamil0201];
						$totjumlahibuhamil0201=number_format($jumlahibuhamil0201,0,",",".");
					echo "$totjumlahibuhamil0201";
 } ?>