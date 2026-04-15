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
	  
		  
			$totlahirlk0104 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0104 from kehamilan where kodekel='0104'");
						$jlhtotlahirlk0104=pg_fetch_array($totlahirlk0104); 
						$jumlahlahirlk0104=$jlhtotlahirlk0104[totjlhlahirlk0104];
						$totjumlahlahirlk0104=number_format($jumlahlahirlk0104,0,",",".");
					echo "$totjumlahlahirlk0104";
 } ?>