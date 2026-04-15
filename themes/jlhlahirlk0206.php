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
	  
		  
			$totlahirlk0206 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0206 from kehamilan where kodekel='0206'");
						$jlhtotlahirlk0206=pg_fetch_array($totlahirlk0206); 
						$jumlahlahirlk0206=$jlhtotlahirlk0206[totjlhlahirlk0206];
						$totjumlahlahirlk0206=number_format($jumlahlahirlk0206,0,",",".");
					echo "$totjumlahlahirlk0206";
 } ?>