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
	  
		  
			$totlahirlk0408 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0408 from kehamilan where kodekel='0408'");
						$jlhtotlahirlk0408=pg_fetch_array($totlahirlk0408); 
						$jumlahlahirlk0408=$jlhtotlahirlk0408[totjlhlahirlk0408];
						$totjumlahlahirlk0408=number_format($jumlahlahirlk0408,0,",",".");
					echo "$totjumlahlahirlk0408";
 } ?>