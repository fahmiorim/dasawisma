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
	  
		  
			$totlahirlk0502 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0502 from kehamilan where kodekel='0502'");
						$jlhtotlahirlk0502=pg_fetch_array($totlahirlk0502); 
						$jumlahlahirlk0502=$jlhtotlahirlk0502[totjlhlahirlk0502];
						$totjumlahlahirlk0502=number_format($jumlahlahirlk0502,0,",",".");
					echo "$totjumlahlahirlk0502";
 } ?>