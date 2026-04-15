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
	  
		  
			$totlahirlk0306 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0306 from kehamilan where kodekel='0306'");
						$jlhtotlahirlk0306=pg_fetch_array($totlahirlk0306); 
						$jumlahlahirlk0306=$jlhtotlahirlk0306[totjlhlahirlk0306];
						$totjumlahlahirlk0306=number_format($jumlahlahirlk0306,0,",",".");
					echo "$totjumlahlahirlk0306";
 } ?>