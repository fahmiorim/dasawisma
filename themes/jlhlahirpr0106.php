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
	  
		  
			$totlahirlpr0106 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0106 from kehamilan where kodekel='0106'");
						$jlhtotlahirlpr0106=pg_fetch_array($totlahirlpr0106); 
						$jumlahlahirlpr0106=$jlhtotlahirlpr0106[totjlhlahirlpr0106];
						$totjumlahlahirlpr0106=number_format($jumlahlahirlpr0106,0,",",".");
					echo "$totjumlahlahirlpr0106";
 } ?>