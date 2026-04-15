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
	  
		  
			$totlahirlk0304 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0304 from kehamilan where kodekel='0304'");
						$jlhtotlahirlk0304=pg_fetch_array($totlahirlk0304); 
						$jumlahlahirlk0304=$jlhtotlahirlk0304[totjlhlahirlk0304];
						$totjumlahlahirlk0304=number_format($jumlahlahirlk0304,0,",",".");
					echo "$totjumlahlahirlk0304";
 } ?>