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
	  
		  
			$totlahirlpr0203 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0203 from kehamilan where kodekel='0203'");
						$jlhtotlahirlpr0203=pg_fetch_array($totlahirlpr0203); 
						$jumlahlahirlpr0203=$jlhtotlahirlpr0203[totjlhlahirlpr0203];
						$totjumlahlahirlpr0203=number_format($jumlahlahirlpr0203,0,",",".");
					echo "$totjumlahlahirlpr0203";
 } ?>