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
	  
		  
			$totlahirlk0207 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0207 from kehamilan where kodekel='0207'");
						$jlhtotlahirlk0207=pg_fetch_array($totlahirlk0207); 
						$jumlahlahirlk0207=$jlhtotlahirlk0207[totjlhlahirlk0207];
						$totjumlahlahirlk0207=number_format($jumlahlahirlk0207,0,",",".");
					echo "$totjumlahlahirlk0207";
 } ?>