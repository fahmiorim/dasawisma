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
	  
		  
			$totjlhjamban0503 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0503 from keluarga where kodekel='0503'");
				$jlhtotjlhjamban0503=pg_fetch_array($totjlhjamban0503); 
				$jumlahjlhjamban0503=$jlhtotjlhjamban0503[totjlhjlhjamban0503];
				$totjumlahjlhjamban0503=number_format($jumlahjlhjamban0503,0,",",".");
			echo "$totjumlahjlhjamban0503";
 } ?>