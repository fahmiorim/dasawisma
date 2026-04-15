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
	  
		  
			$totjlhjamban0405 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0405 from keluarga where kodekel='0405'");
				$jlhtotjlhjamban0405=pg_fetch_array($totjlhjamban0405); 
				$jumlahjlhjamban0405=$jlhtotjlhjamban0405[totjlhjlhjamban0405];
				$totjumlahjlhjamban0405=number_format($jumlahjlhjamban0405,0,",",".");
			echo "$totjumlahjlhjamban0405";
 } ?>