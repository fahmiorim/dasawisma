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
	  
		  
			$totlahirlk0508 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0508 from kehamilan where kodekel='0508'");
						$jlhtotlahirlk0508=pg_fetch_array($totlahirlk0508); 
						$jumlahlahirlk0508=$jlhtotlahirlk0508[totjlhlahirlk0508];
						$totjumlahlahirlk0508=number_format($jumlahlahirlk0508,0,",",".");
					echo "$totjumlahlahirlk0508";
 } ?>