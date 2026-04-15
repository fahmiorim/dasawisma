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
	  
		  
			$totjlhjamban0403 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0403 from keluarga where kodekel='0403'");
				$jlhtotjlhjamban0403=pg_fetch_array($totjlhjamban0403); 
				$jumlahjlhjamban0403=$jlhtotjlhjamban0403[totjlhjlhjamban0403];
				$totjumlahjlhjamban0403=number_format($jumlahjlhjamban0403,0,",",".");
			echo "$totjumlahjlhjamban0403";
 } ?>