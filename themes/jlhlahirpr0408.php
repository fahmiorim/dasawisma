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
	  
		  
			$totlahirlpr0408 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0408 from kehamilan where kodekel='0408'");
						$jlhtotlahirlpr0408=pg_fetch_array($totlahirlpr0408); 
						$jumlahlahirlpr0408=$jlhtotlahirlpr0408[totjlhlahirlpr0408];
						$totjumlahlahirlpr0408=number_format($jumlahlahirlpr0408,0,",",".");
					echo "$totjumlahlahirlpr0408";
 } ?>