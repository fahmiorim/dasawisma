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
	  
		  
			$totlahirlk0307 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0307 from kehamilan where kodekel='0307'");
						$jlhtotlahirlk0307=pg_fetch_array($totlahirlk0307); 
						$jumlahlahirlk0307=$jlhtotlahirlk0307[totjlhlahirlk0307];
						$totjumlahlahirlk0307=number_format($jumlahlahirlk0307,0,",",".");
					echo "$totjumlahlahirlk0307";
 } ?>