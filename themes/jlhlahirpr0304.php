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
	  
		  
			$totlahirlpr0304 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0304 from kehamilan where kodekel='0304'");
						$jlhtotlahirlpr0304=pg_fetch_array($totlahirlpr0304); 
						$jumlahlahirlpr0304=$jlhtotlahirlpr0304[totjlhlahirlpr0304];
						$totjumlahlahirlpr0304=number_format($jumlahlahirlpr0304,0,",",".");
					echo "$totjumlahlahirlpr0304";
 } ?>