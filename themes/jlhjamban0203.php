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
	  
		  
			$totjlhjamban0203 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0203 from keluarga where kodekel='0203'");
				$jlhtotjlhjamban0203=pg_fetch_array($totjlhjamban0203); 
				$jumlahjlhjamban0203=$jlhtotjlhjamban0203[totjlhjlhjamban0203];
				$totjumlahjlhjamban0203=number_format($jumlahjlhjamban0203,0,",",".");
			echo "$totjumlahjlhjamban0203";
 } ?>