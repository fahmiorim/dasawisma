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
	  
		  
			$totlahirlk0401 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0401 from kehamilan where kodekel='0401'");
						$jlhtotlahirlk0401=pg_fetch_array($totlahirlk0401); 
						$jumlahlahirlk0401=$jlhtotlahirlk0401[totjlhlahirlk0401];
						$totjumlahlahirlk0401=number_format($jumlahlahirlk0401,0,",",".");
					echo "$totjumlahlahirlk0401";
 } ?>