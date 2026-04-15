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
	  
		  
					$totibuhamil0103 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0103 from kehamilan where kodekel='0103'");
						$jlhtotibuhamil0103=pg_fetch_array($totibuhamil0103); 
						$jumlahibuhamil0103=$jlhtotibuhamil0103[totjlhibuhamil0103];
						$totjumlahibuhamil0103=number_format($jumlahibuhamil0103,0,",",".");
					echo "$totjumlahibuhamil0103";
 } ?>