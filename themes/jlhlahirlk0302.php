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
	  
		  
			$totlahirlk0302 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0302 from kehamilan where kodekel='0302'");
						$jlhtotlahirlk0302=pg_fetch_array($totlahirlk0302); 
						$jumlahlahirlk0302=$jlhtotlahirlk0302[totjlhlahirlk0302];
						$totjumlahlahirlk0302=number_format($jumlahlahirlk0302,0,",",".");
					echo "$totjumlahlahirlk0302";
 } ?>