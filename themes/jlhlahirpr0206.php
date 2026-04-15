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
	  
		  
			$totlahirlpr0206 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0206 from kehamilan where kodekel='0206'");
						$jlhtotlahirlpr0206=pg_fetch_array($totlahirlpr0206); 
						$jumlahlahirlpr0206=$jlhtotlahirlpr0206[totjlhlahirlpr0206];
						$totjumlahlahirlpr0206=number_format($jumlahlahirlpr0206,0,",",".");
					echo "$totjumlahlahirlpr0206";
 } ?>