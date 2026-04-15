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
	  
		  
			$totlahirlk0504 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0504 from kehamilan where kodekel='0504'");
						$jlhtotlahirlk0504=pg_fetch_array($totlahirlk0504); 
						$jumlahlahirlk0504=$jlhtotlahirlk0504[totjlhlahirlk0504];
						$totjumlahlahirlk0504=number_format($jumlahlahirlk0504,0,",",".");
					echo "$totjumlahlahirlk0504";
 } ?>