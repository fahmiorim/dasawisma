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
	  
		  
			$totlahirlpr0102 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0102 from kehamilan where kodekel='0102'");
						$jlhtotlahirlpr0102=pg_fetch_array($totlahirlpr0102); 
						$jumlahlahirlpr0102=$jlhtotlahirlpr0102[totjlhlahirlpr0102];
						$totjumlahlahirlpr0102=number_format($jumlahlahirlpr0102,0,",",".");
					echo "$totjumlahlahirlpr0102";
 } ?>