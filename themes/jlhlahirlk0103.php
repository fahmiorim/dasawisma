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
	  
		  
			$totlahirlk0103 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0103 from kehamilan where kodekel='0103'");
						$jlhtotlahirlk0103=pg_fetch_array($totlahirlk0103); 
						$jumlahlahirlk0103=$jlhtotlahirlk0103[totjlhlahirlk0103];
						$totjumlahlahirlk0103=number_format($jumlahlahirlk0103,0,",",".");
					echo "$totjumlahlahirlk0103";
 } ?>