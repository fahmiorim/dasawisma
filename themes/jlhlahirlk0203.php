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
	  
		  
			$totlahirlk0203 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0203 from kehamilan where kodekel='0203'");
						$jlhtotlahirlk0203=pg_fetch_array($totlahirlk0203); 
						$jumlahlahirlk0203=$jlhtotlahirlk0203[totjlhlahirlk0203];
						$totjumlahlahirlk0203=number_format($jumlahlahirlk0203,0,",",".");
					echo "$totjumlahlahirlk0203";
 } ?>