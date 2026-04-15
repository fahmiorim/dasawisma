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
	  
		  
			$totlahirlpr0406 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0406 from kehamilan where kodekel='0406'");
						$jlhtotlahirlpr0406=pg_fetch_array($totlahirlpr0406); 
						$jumlahlahirlpr0406=$jlhtotlahirlpr0406[totjlhlahirlpr0406];
						$totjumlahlahirlpr0406=number_format($jumlahlahirlpr0406,0,",",".");
					echo "$totjumlahlahirlpr0406";
 } ?>