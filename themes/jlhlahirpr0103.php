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
	  
		  
			$totlahirlpr0103 =pg_query($koneksi, "select sum(bayilahirp) as totjlhlahirlpr0103 from kehamilan where kodekel='0103'");
						$jlhtotlahirlpr0103=pg_fetch_array($totlahirlpr0103); 
						$jumlahlahirlpr0103=$jlhtotlahirlpr0103[totjlhlahirlpr0103];
						$totjumlahlahirlpr0103=number_format($jumlahlahirlpr0103,0,",",".");
					echo "$totjumlahlahirlpr0103";
 } ?>