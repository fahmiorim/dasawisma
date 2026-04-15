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
	  
		  
			$totlahirlk0201 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0201 from kehamilan where kodekel='0201'");
						$jlhtotlahirlk0201=pg_fetch_array($totlahirlk0201); 
						$jumlahlahirlk0201=$jlhtotlahirlk0201[totjlhlahirlk0201];
						$totjumlahlahirlk0201=number_format($jumlahlahirlk0201,0,",",".");
					echo "$totjumlahlahirlk0201";
 } ?>