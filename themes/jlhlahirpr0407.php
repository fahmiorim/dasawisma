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
	  
		  
			$totlahirlpr0407 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0407 from kehamilan where kodekel='0407'");
						$jlhtotlahirlpr0407=pg_fetch_array($totlahirlpr0407); 
						$jumlahlahirlpr0407=$jlhtotlahirlpr0407[totjlhlahirlpr0407];
						$totjumlahlahirlpr0407=number_format($jumlahlahirlpr0407,0,",",".");
					echo "$totjumlahlahirlpr0407";
 } ?>