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
	  
		  
			$totlahirlpr0306 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0306 from kehamilan where kodekel='0306'");
						$jlhtotlahirlpr0306=pg_fetch_array($totlahirlpr0306); 
						$jumlahlahirlpr0306=$jlhtotlahirlpr0306[totjlhlahirlpr0306];
						$totjumlahlahirlpr0306=number_format($jumlahlahirlpr0306,0,",",".");
					echo "$totjumlahlahirlpr0306";
 } ?>