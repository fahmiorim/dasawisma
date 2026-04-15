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
	  
		  
					$totibuhamil0402 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0402 from kehamilan where kodekel='0402'");
						$jlhtotibuhamil0402=pg_fetch_array($totibuhamil0402); 
						$jumlahibuhamil0402=$jlhtotibuhamil0402[totjlhibuhamil0402];
						$totjumlahibuhamil0402=number_format($jumlahibuhamil0402,0,",",".");
					echo "$totjumlahibuhamil0402";
 } ?>