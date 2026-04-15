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
	  
		  
			$totlahirlpr0501 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0501 from kehamilan where kodekel='0501'");
						$jlhtotlahirlpr0501=pg_fetch_array($totlahirlpr0501); 
						$jumlahlahirlpr0501=$jlhtotlahirlpr0501[totjlhlahirlpr0501];
						$totjumlahlahirlpr0501=number_format($jumlahlahirlpr0501,0,",",".");
					echo "$totjumlahlahirlpr0501";
 } ?>