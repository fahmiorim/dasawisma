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
	  
		  
			$totlahirlk0402 =pg_query($koneksi, "select sum(bayilahirl) as totjlhlahirlk0402 from kehamilan where kodekel='0402'");
						$jlhtotlahirlk0402=pg_fetch_array($totlahirlk0402); 
						$jumlahlahirlk0402=$jlhtotlahirlk0402[totjlhlahirlk0402];
						$totjumlahlahirlk0402=number_format($jumlahlahirlk0402,0,",",".");
					echo "$totjumlahlahirlk0402";
 } ?>