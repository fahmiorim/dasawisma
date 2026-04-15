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
	  
		  
			$totlahirlk0407 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0407 from kehamilan where kodekel='0407'");
						$jlhtotlahirlk0407=pg_fetch_array($totlahirlk0407); 
						$jumlahlahirlk0407=$jlhtotlahirlk0407[totjlhlahirlk0407];
						$totjumlahlahirlk0407=number_format($jumlahlahirlk0407,0,",",".");
					echo "$totjumlahlahirlk0407";
 } ?>