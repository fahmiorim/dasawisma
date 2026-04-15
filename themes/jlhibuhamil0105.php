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
	  
		  
					$totibuhamil0105 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0105 from kehamilan where kodekel='0105'");
						$jlhtotibuhamil0105=pg_fetch_array($totibuhamil0105); 
						$jumlahibuhamil0105=$jlhtotibuhamil0105[totjlhibuhamil0105];
						$totjumlahibuhamil0105=number_format($jumlahibuhamil0105,0,",",".");
					echo "$totjumlahibuhamil0105";
 } ?>