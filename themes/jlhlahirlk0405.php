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
	  
		  
			$totlahirlk0405 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0405 from kehamilan where kodekel='0405'");
						$jlhtotlahirlk0405=pg_fetch_array($totlahirlk0405); 
						$jumlahlahirlk0405=$jlhtotlahirlk0405[totjlhlahirlk0405];
						$totjumlahlahirlk0405=number_format($jumlahlahirlk0405,0,",",".");
					echo "$totjumlahlahirlk0405";
 } ?>