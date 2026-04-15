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
	  
		  
			$totlahirlk0505 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0505 from kehamilan where kodekel='0505'");
						$jlhtotlahirlk0505=pg_fetch_array($totlahirlk0505); 
						$jumlahlahirlk0505=$jlhtotlahirlk0505[totjlhlahirlk0505];
						$totjumlahlahirlk0505=number_format($jumlahlahirlk0505,0,",",".");
					echo "$totjumlahlahirlk0505";
 } ?>