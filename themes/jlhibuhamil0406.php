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
	  
		  
					$totibuhamil0406 =pg_query($koneksi, "select sum(jlhbumil) as totjlhibuhamil0406 from kehamilan where kodekel='0406'");
						$jlhtotibuhamil0406=pg_fetch_array($totibuhamil0406); 
						$jumlahibuhamil0406=$jlhtotibuhamil0406[totjlhibuhamil0406];
						$totjumlahibuhamil0406=number_format($jumlahibuhamil0406,0,",",".");
					echo "$totjumlahibuhamil0406";
 } ?>