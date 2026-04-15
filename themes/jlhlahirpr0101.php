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
	  
		  
			$totlahirlpr0101 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0101 from kehamilan where kodekel='0101'");
						$jlhtotlahirlpr0101=pg_fetch_array($totlahirlpr0101); 
						$jumlahlahirlpr0101=$jlhtotlahirlpr0101[totjlhlahirlpr0101];
						$totjumlahlahirlpr0101=number_format($jumlahlahirlpr0101,0,",",".");
					echo "$totjumlahlahirlpr0101";
 } ?>