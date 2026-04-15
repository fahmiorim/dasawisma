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
	  
		  
			$totlahirlk0301 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0301 from kehamilan where kodekel='0301'");
						$jlhtotlahirlk0301=pg_fetch_array($totlahirlk0301); 
						$jumlahlahirlk0301=$jlhtotlahirlk0301[totjlhlahirlk0301];
						$totjumlahlahirlk0301=number_format($jumlahlahirlk0301,0,",",".");
					echo "$totjumlahlahirlk0301";
 } ?>