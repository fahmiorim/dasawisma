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
	  
		  
			$totlahirlpr0403 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0403 from kehamilan where kodekel='0403'");
						$jlhtotlahirlpr0403=pg_fetch_array($totlahirlpr0403); 
						$jumlahlahirlpr0403=$jlhtotlahirlpr0403[totjlhlahirlpr0403];
						$totjumlahlahirlpr0403=number_format($jumlahlahirlpr0403,0,",",".");
					echo "$totjumlahlahirlpr0403";
 } ?>