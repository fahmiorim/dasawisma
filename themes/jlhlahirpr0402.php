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
	  
		  
			$totlahirlpr0402 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0402 from kehamilan where kodekel='0402'");
						$jlhtotlahirlpr0402=pg_fetch_array($totlahirlpr0402); 
						$jumlahlahirlpr0402=$jlhtotlahirlpr0402[totjlhlahirlpr0402];
						$totjumlahlahirlpr0402=number_format($jumlahlahirlpr0402,0,",",".");
					echo "$totjumlahlahirlpr0402";
 } ?>