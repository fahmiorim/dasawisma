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
	  
		  
			$totlahirlk0506 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0506 from kehamilan where kodekel='0506'");
						$jlhtotlahirlk0506=pg_fetch_array($totlahirlk0506); 
						$jumlahlahirlk0506=$jlhtotlahirlk0506[totjlhlahirlk0506];
						$totjumlahlahirlk0506=number_format($jumlahlahirlk0506,0,",",".");
					echo "$totjumlahlahirlk0506";
 } ?>