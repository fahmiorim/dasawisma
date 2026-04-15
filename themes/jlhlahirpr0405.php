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
	  
		  
			$totlahirlpr0405 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0405 from kehamilan where kodekel='0405'");
						$jlhtotlahirlpr0405=pg_fetch_array($totlahirlpr0405); 
						$jumlahlahirlpr0405=$jlhtotlahirlpr0405[totjlhlahirlpr0405];
						$totjumlahlahirlpr0405=number_format($jumlahlahirlpr0405,0,",",".");
					echo "$totjumlahlahirlpr0405";
 } ?>