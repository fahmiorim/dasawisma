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
	  
		  
			$totlahirlpr0503 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0503 from kehamilan where kodekel='0503'");
						$jlhtotlahirlpr0503=pg_fetch_array($totlahirlpr0503); 
						$jumlahlahirlpr0503=$jlhtotlahirlpr0503[totjlhlahirlpr0503];
						$totjumlahlahirlpr0503=number_format($jumlahlahirlpr0503,0,",",".");
					echo "$totjumlahlahirlpr0503";
 } ?>