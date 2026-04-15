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
	  
		  
			$totlahirlk0409 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0409 from kehamilan where kodekel='0409'");
						$jlhtotlahirlk0409=pg_fetch_array($totlahirlk0409); 
						$jumlahlahirlk0409=$jlhtotlahirlk0409[totjlhlahirlk0409];
						$totjumlahlahirlk0409=number_format($jumlahlahirlk0409,0,",",".");
					echo "$totjumlahlahirlk0409";
 } ?>