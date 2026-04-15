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
	  
		  
			$totlahirlpr0207 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0207 from kehamilan where kodekel='0207'");
						$jlhtotlahirlpr0207=pg_fetch_array($totlahirlpr0207); 
						$jumlahlahirlpr0207=$jlhtotlahirlpr0207[totjlhlahirlpr0207];
						$totjumlahlahirlpr0207=number_format($jumlahlahirlpr0207,0,",",".");
					echo "$totjumlahlahirlpr0207";
 } ?>