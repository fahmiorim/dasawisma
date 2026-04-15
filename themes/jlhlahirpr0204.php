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
	  
		  
			$totlahirlpr0204 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0204 from kehamilan where kodekel='0204'");
						$jlhtotlahirlpr0204=pg_fetch_array($totlahirlpr0204); 
						$jumlahlahirlpr0204=$jlhtotlahirlpr0204[totjlhlahirlpr0204];
						$totjumlahlahirlpr0204=number_format($jumlahlahirlpr0204,0,",",".");
					echo "$totjumlahlahirlpr0204";
 } ?>