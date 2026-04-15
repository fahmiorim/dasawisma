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
	  
		  
			$totlahirlk0106 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0106 from kehamilan where kodekel='0106'");
						$jlhtotlahirlk0106=pg_fetch_array($totlahirlk0106); 
						$jumlahlahirlk0106=$jlhtotlahirlk0106[totjlhlahirlk0106];
						$totjumlahlahirlk0106=number_format($jumlahlahirlk0106,0,",",".");
					echo "$totjumlahlahirlk0106";
 } ?>