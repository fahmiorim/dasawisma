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
	  
		  
			$totlahirlk0404 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0404 from kehamilan where kodekel='0404'");
						$jlhtotlahirlk0404=pg_fetch_array($totlahirlk0404); 
						$jumlahlahirlk0404=$jlhtotlahirlk0404[totjlhlahirlk0404];
						$totjumlahlahirlk0404=number_format($jumlahlahirlk0404,0,",",".");
					echo "$totjumlahlahirlk0404";
 } ?>