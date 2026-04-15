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
	  
		  
			$totlahirlk0101 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0101 from kehamilan where kodekel='0101'");
						$jlhtotlahirlk0101=pg_fetch_array($totlahirlk0101); 
						$jumlahlahirlk0101=$jlhtotlahirlk0101[totjlhlahirlk0101];
						$totjumlahlahirlk0101=number_format($jumlahlahirlk0101,0,",",".");
					echo "$totjumlahlahirlk0101";
 } ?>