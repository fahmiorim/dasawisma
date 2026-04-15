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
	  
		  
			$totlahirlpr0303 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0303 from kehamilan where kodekel='0303'");
						$jlhtotlahirlpr0303=pg_fetch_array($totlahirlpr0303); 
						$jumlahlahirlpr0303=$jlhtotlahirlpr0303[totjlhlahirlpr0303];
						$totjumlahlahirlpr0303=number_format($jumlahlahirlpr0303,0,",",".");
					echo "$totjumlahlahirlpr0303";
 } ?>