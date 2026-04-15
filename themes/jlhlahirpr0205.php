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
	  
		  
			$totlahirlpr0205 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0205 from kehamilan where kodekel='0205'");
						$jlhtotlahirlpr0205=pg_fetch_array($totlahirlpr0205); 
						$jumlahlahirlpr0205=$jlhtotlahirlpr0205[totjlhlahirlpr0205];
						$totjumlahlahirlpr0205=number_format($jumlahlahirlpr0205,0,",",".");
					echo "$totjumlahlahirlpr0205";
 } ?>