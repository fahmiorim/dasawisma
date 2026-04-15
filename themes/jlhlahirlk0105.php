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
	  
		  
			$totlahirlk0105 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0105 from kehamilan where kodekel='0105'");
						$jlhtotlahirlk0105=pg_fetch_array($totlahirlk0105); 
						$jumlahlahirlk0105=$jlhtotlahirlk0105[totjlhlahirlk0105];
						$totjumlahlahirlk0105=number_format($jumlahlahirlk0105,0,",",".");
					echo "$totjumlahlahirlk0105";
 } ?>