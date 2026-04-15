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
	  
		  
			$totlahirlpr0505 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0505 from kehamilan where kodekel='0505'");
						$jlhtotlahirlpr0505=pg_fetch_array($totlahirlpr0505); 
						$jumlahlahirlpr0505=$jlhtotlahirlpr0505[totjlhlahirlpr0505];
						$totjumlahlahirlpr0505=number_format($jumlahlahirlpr0505,0,",",".");
					echo "$totjumlahlahirlpr0505";
 } ?>