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
	  
		  
			$totlahirlpr0302 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0302 from kehamilan where kodekel='0302'");
						$jlhtotlahirlpr0302=pg_fetch_array($totlahirlpr0302); 
						$jumlahlahirlpr0302=$jlhtotlahirlpr0302[totjlhlahirlpr0302];
						$totjumlahlahirlpr0302=number_format($jumlahlahirlpr0302,0,",",".");
					echo "$totjumlahlahirlpr0302";
 } ?>