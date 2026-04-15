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
	  
		  
			$totlahirlk0403 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0403 from kehamilan where kodekel='0403'");
						$jlhtotlahirlk0403=pg_fetch_array($totlahirlk0403); 
						$jumlahlahirlk0403=$jlhtotlahirlk0403[totjlhlahirlk0403];
						$totjumlahlahirlk0403=number_format($jumlahlahirlk0403,0,",",".");
					echo "$totjumlahlahirlk0403";
 } ?>