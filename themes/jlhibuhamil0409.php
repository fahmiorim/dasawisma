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
	  
		  
					$totibuhamil0409 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0409 from kehamilan where kodekel='0409'");
						$jlhtotibuhamil0409=pg_fetch_array($totibuhamil0409); 
						$jumlahibuhamil0409=$jlhtotibuhamil0409[totjlhibuhamil0409];
						$totjumlahibuhamil0409=number_format($jumlahibuhamil0409,0,",",".");
					echo "$totjumlahibuhamil0409";
 } ?>