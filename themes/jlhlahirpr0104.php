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
	  
		  
			$totlahirlpr0104 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0104 from kehamilan where kodekel='0104'");
						$jlhtotlahirlpr0104=pg_fetch_array($totlahirlpr0104); 
						$jumlahlahirlpr0104=$jlhtotlahirlpr0104[totjlhlahirlpr0104];
						$totjumlahlahirlpr0104=number_format($jumlahlahirlpr0104,0,",",".");
					echo "$totjumlahlahirlpr0104";
 } ?>