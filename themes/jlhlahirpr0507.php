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
	  
		  
			$totlahirlpr0507 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0507 from kehamilan where kodekel='0507'");
						$jlhtotlahirlpr0507=pg_fetch_array($totlahirlpr0507); 
						$jumlahlahirlpr0507=$jlhtotlahirlpr0507[totjlhlahirlpr0507];
						$totjumlahlahirlpr0507=number_format($jumlahlahirlpr0507,0,",",".");
					echo "$totjumlahlahirlpr0507";
 } ?>