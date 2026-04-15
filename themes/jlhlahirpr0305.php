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
	  
		  
			$totlahirlpr0305 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0305 from kehamilan where kodekel='0305'");
						$jlhtotlahirlpr0305=pg_fetch_array($totlahirlpr0305); 
						$jumlahlahirlpr0305=$jlhtotlahirlpr0305[totjlhlahirlpr0305];
						$totjumlahlahirlpr0305=number_format($jumlahlahirlpr0305,0,",",".");
					echo "$totjumlahlahirlpr0305";
 } ?>