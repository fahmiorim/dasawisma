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
	  
		  
					$totibuhamil0305 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0305 from kehamilan where kodekel='0305'");
						$jlhtotibuhamil0305=pg_fetch_array($totibuhamil0305); 
						$jumlahibuhamil0305=$jlhtotibuhamil0305[totjlhibuhamil0305];
						$totjumlahibuhamil0305=number_format($jumlahibuhamil0305,0,",",".");
					echo "$totjumlahibuhamil0305";
 } ?>