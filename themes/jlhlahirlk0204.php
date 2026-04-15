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
	  
		  
			$totlahirlk0204 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0204 from kehamilan where kodekel='0204'");
						$jlhtotlahirlk0204=pg_fetch_array($totlahirlk0204); 
						$jumlahlahirlk0204=$jlhtotlahirlk0204[totjlhlahirlk0204];
						$totjumlahlahirlk0204=number_format($jumlahlahirlk0204,0,",",".");
					echo "$totjumlahlahirlk0204";
 } ?>