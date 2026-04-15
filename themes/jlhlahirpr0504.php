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
	  
		  
			$totlahirlpr0504 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0504 from kehamilan where kodekel='0504'");
						$jlhtotlahirlpr0504=pg_fetch_array($totlahirlpr0504); 
						$jumlahlahirlpr0504=$jlhtotlahirlpr0504[totjlhlahirlpr0504];
						$totjumlahlahirlpr0504=number_format($jumlahlahirlpr0504,0,",",".");
					echo "$totjumlahlahirlpr0504";
 } ?>