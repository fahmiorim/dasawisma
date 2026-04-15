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
	  
		  
			$totlahirlpr0202 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0202 from kehamilan where kodekel='0202'");
						$jlhtotlahirlpr0202=pg_fetch_array($totlahirlpr0202); 
						$jumlahlahirlpr0202=$jlhtotlahirlpr0202[totjlhlahirlpr0202];
						$totjumlahlahirlpr0202=number_format($jumlahlahirlpr0202,0,",",".");
					echo "$totjumlahlahirlpr0202";
 } ?>