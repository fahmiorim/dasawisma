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
	  
		  
			$totlahirlk0305 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0305 from kehamilan where kodekel='0305'");
						$jlhtotlahirlk0305=pg_fetch_array($totlahirlk0305); 
						$jumlahlahirlk0305=$jlhtotlahirlk0305[totjlhlahirlk0305];
						$totjumlahlahirlk0305=number_format($jumlahlahirlk0305,0,",",".");
					echo "$totjumlahlahirlk0305";
 } ?>