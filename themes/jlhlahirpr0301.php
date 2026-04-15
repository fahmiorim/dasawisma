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
	  
		  
			$totlahirlpr0301 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0301 from kehamilan where kodekel='0301'");
						$jlhtotlahirlpr0301=pg_fetch_array($totlahirlpr0301); 
						$jumlahlahirlpr0301=$jlhtotlahirlpr0301[totjlhlahirlpr0301];
						$totjumlahlahirlpr0301=number_format($jumlahlahirlpr0301,0,",",".");
					echo "$totjumlahlahirlpr0301";
 } ?>