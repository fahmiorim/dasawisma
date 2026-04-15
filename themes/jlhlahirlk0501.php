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
	  
		  
			$totlahirlk0501 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0501 from kehamilan where kodekel='0501'");
						$jlhtotlahirlk0501=pg_fetch_array($totlahirlk0501); 
						$jumlahlahirlk0501=$jlhtotlahirlk0501[totjlhlahirlk0501];
						$totjumlahlahirlk0501=number_format($jumlahlahirlk0501,0,",",".");
					echo "$totjumlahlahirlk0501";
 } ?>