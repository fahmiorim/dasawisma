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
	  
		  
			$totlahirlpr0201 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0201 from kehamilan where kodekel='0201'");
						$jlhtotlahirlpr0201=pg_fetch_array($totlahirlpr0201); 
						$jumlahlahirlpr0201=$jlhtotlahirlpr0201[totjlhlahirlpr0201];
						$totjumlahlahirlpr0201=number_format($jumlahlahirlpr0201,0,",",".");
					echo "$totjumlahlahirlpr0201";
 } ?>