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
	  
		  
			$totlahirlpr0502 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0502 from kehamilan where kodekel='0502'");
						$jlhtotlahirlpr0502=pg_fetch_array($totlahirlpr0502); 
						$jumlahlahirlpr0502=$jlhtotlahirlpr0502[totjlhlahirlpr0502];
						$totjumlahlahirlpr0502=number_format($jumlahlahirlpr0502,0,",",".");
					echo "$totjumlahlahirlpr0502";
 } ?>