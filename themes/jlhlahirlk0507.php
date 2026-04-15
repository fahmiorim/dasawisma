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
	  
		  
			$totlahirlk0507 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0507 from kehamilan where kodekel='0507'");
						$jlhtotlahirlk0507=pg_fetch_array($totlahirlk0507); 
						$jumlahlahirlk0507=$jlhtotlahirlk0507[totjlhlahirlk0507];
						$totjumlahlahirlk0507=number_format($jumlahlahirlk0507,0,",",".");
					echo "$totjumlahlahirlk0507";
 } ?>