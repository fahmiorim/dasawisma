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
	  
		  
			$totlahirlpr0508 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0508 from kehamilan where kodekel='0508'");
						$jlhtotlahirlpr0508=pg_fetch_array($totlahirlpr0508); 
						$jumlahlahirlpr0508=$jlhtotlahirlpr0508[totjlhlahirlpr0508];
						$totjumlahlahirlpr0508=number_format($jumlahlahirlpr0508,0,",",".");
					echo "$totjumlahlahirlpr0508";
 } ?>