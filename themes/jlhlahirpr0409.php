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
	  
		  
			$totlahirlpr0409 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0409 from kehamilan where kodekel='0409'");
						$jlhtotlahirlpr0409=pg_fetch_array($totlahirlpr0409); 
						$jumlahlahirlpr0409=$jlhtotlahirlpr0409[totjlhlahirlpr0409];
						$totjumlahlahirlpr0409=number_format($jumlahlahirlpr0409,0,",",".");
					echo "$totjumlahlahirlpr0409";
 } ?>