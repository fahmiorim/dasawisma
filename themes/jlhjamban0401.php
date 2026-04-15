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
	  
		  
			$totjlhjamban0401 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0401 from keluarga where kodekel='0401'");
				$jlhtotjlhjamban0401=pg_fetch_array($totjlhjamban0401); 
				$jumlahjlhjamban0401=$jlhtotjlhjamban0401[totjlhjlhjamban0401];
				$totjumlahjlhjamban0401=number_format($jumlahjlhjamban0401,0,",",".");
			echo "$totjumlahjlhjamban0401";
 } ?>