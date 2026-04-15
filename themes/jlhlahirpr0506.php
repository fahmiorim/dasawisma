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
	  
		  
			$totlahirlpr0506 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0506 from kehamilan where kodekel='0506'");
						$jlhtotlahirlpr0506=pg_fetch_array($totlahirlpr0506); 
						$jumlahlahirlpr0506=$jlhtotlahirlpr0506[totjlhlahirlpr0506];
						$totjumlahlahirlpr0506=number_format($jumlahlahirlpr0506,0,",",".");
					echo "$totjumlahlahirlpr0506";
 } ?>