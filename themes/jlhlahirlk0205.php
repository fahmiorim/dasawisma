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
	  
		  
			$totlahirlk0205 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0205 from kehamilan where kodekel='0205'");
						$jlhtotlahirlk0205=pg_fetch_array($totlahirlk0205); 
						$jumlahlahirlk0205=$jlhtotlahirlk0205[totjlhlahirlk0205];
						$totjumlahlahirlk0205=number_format($jumlahlahirlk0205,0,",",".");
					echo "$totjumlahlahirlk0205";
 } ?>