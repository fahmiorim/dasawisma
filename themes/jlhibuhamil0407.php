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
	  
		  
					$totibuhamil0407 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0407 from kehamilan where kodekel='0407'");
						$jlhtotibuhamil0407=pg_fetch_array($totibuhamil0407); 
						$jumlahibuhamil0407=$jlhtotibuhamil0407[totjlhibuhamil0407];
						$totjumlahibuhamil0407=number_format($jumlahibuhamil0407,0,",",".");
					echo "$totjumlahibuhamil0407";
 } ?>