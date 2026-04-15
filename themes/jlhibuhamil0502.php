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
	  
		  
					$totibuhamil0502 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0502 from kehamilan where kodekel='0502'");
						$jlhtotibuhamil0502=pg_fetch_array($totibuhamil0502); 
						$jumlahibuhamil0502=$jlhtotibuhamil0502[totjlhibuhamil0502];
						$totjumlahibuhamil0502=number_format($jumlahibuhamil0502,0,",",".");
					echo "$totjumlahibuhamil0502";
 } ?>