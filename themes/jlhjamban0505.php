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
	  
		  
			$totjlhjamban0505 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0505 from keluarga where kodekel='0505'");
				$jlhtotjlhjamban0505=pg_fetch_array($totjlhjamban0505); 
				$jumlahjlhjamban0505=$jlhtotjlhjamban0505[totjlhjlhjamban0505];
				$totjumlahjlhjamban0505=number_format($jumlahjlhjamban0505,0,",",".");
			echo "$totjumlahjlhjamban0505";
 } ?>