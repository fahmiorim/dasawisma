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
	  
		  
			$totlahirlpr0401 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0401 from kehamilan where kodekel='0401'");
						$jlhtotlahirlpr0401=pg_fetch_array($totlahirlpr0401); 
						$jumlahlahirlpr0401=$jlhtotlahirlpr0401[totjlhlahirlpr0401];
						$totjumlahlahirlpr0401=number_format($jumlahlahirlpr0401,0,",",".");
					echo "$totjumlahlahirlpr0401";
 } ?>