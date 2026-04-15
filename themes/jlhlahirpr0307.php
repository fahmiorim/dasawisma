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
	  
		  
			$totlahirlpr0307 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0307 from kehamilan where kodekel='0307'");
						$jlhtotlahirlpr0307=pg_fetch_array($totlahirlpr0307); 
						$jumlahlahirlpr0307=$jlhtotlahirlpr0307[totjlhlahirlpr0307];
						$totjumlahlahirlpr0307=number_format($jumlahlahirlpr0307,0,",",".");
					echo "$totjumlahlahirlpr0307";
 } ?>