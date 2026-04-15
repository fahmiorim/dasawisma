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
	  
		  
			$totlahirlpr0105 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0105 from kehamilan where kodekel='0105'");
						$jlhtotlahirlpr0105=pg_fetch_array($totlahirlpr0105); 
						$jumlahlahirlpr0105=$jlhtotlahirlpr0105[totjlhlahirlpr0105];
						$totjumlahlahirlpr0105=number_format($jumlahlahirlpr0105,0,",",".");
					echo "$totjumlahlahirlpr0105";
 } ?>