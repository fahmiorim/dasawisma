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
	  
		  
			$totlahirlpr0404 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0404 from kehamilan where kodekel='0404'");
						$jlhtotlahirlpr0404=pg_fetch_array($totlahirlpr0404); 
						$jumlahlahirlpr0404=$jlhtotlahirlpr0404[totjlhlahirlpr0404];
						$totjumlahlahirlpr0404=number_format($jumlahlahirlpr0404,0,",",".");
					echo "$totjumlahlahirlpr0404";
 } ?>