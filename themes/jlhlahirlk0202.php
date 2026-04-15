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
	  
		  
			$totlahirlk0202 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0202 from kehamilan where kodekel='0202'");
						$jlhtotlahirlk0202=pg_fetch_array($totlahirlk0202); 
						$jumlahlahirlk0202=$jlhtotlahirlk0202[totjlhlahirlk0202];
						$totjumlahlahirlk0202=number_format($jumlahlahirlk0202,0,",",".");
					echo "$totjumlahlahirlk0202";
 } ?>