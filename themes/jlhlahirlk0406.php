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
	  
		  
			$totlahirlk0406 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0406 from kehamilan where kodekel='0406'");
						$jlhtotlahirlk0406=pg_fetch_array($totlahirlk0406); 
						$jumlahlahirlk0406=$jlhtotlahirlk0406[totjlhlahirlk0406];
						$totjumlahlahirlk0406=number_format($jumlahlahirlk0406,0,",",".");
					echo "$totjumlahlahirlk0406";
 } ?>