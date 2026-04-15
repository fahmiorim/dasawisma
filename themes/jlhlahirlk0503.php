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
	  
		  
			$totlahirlk0503 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0503 from kehamilan where kodekel='0503'");
						$jlhtotlahirlk0503=pg_fetch_array($totlahirlk0503); 
						$jumlahlahirlk0503=$jlhtotlahirlk0503[totjlhlahirlk0503];
						$totjumlahlahirlk0503=number_format($jumlahlahirlk0503,0,",",".");
					echo "$totjumlahlahirlk0503";
 } ?>