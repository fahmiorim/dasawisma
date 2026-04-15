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
	  
		  
			$totlahirlk0102 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0102 from kehamilan where kodekel='0102'");
						$jlhtotlahirlk0102=pg_fetch_array($totlahirlk0102); 
						$jumlahlahirlk0102=$jlhtotlahirlk0102[totjlhlahirlk0102];
						$totjumlahlahirlk0102=number_format($jumlahlahirlk0102,0,",",".");
					echo "$totjumlahlahirlk0102";
 } ?>