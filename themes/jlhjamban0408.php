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
	  
		  
			$totjlhjamban0408 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0408 from keluarga where kodekel='0408'");
				$jlhtotjlhjamban0408=pg_fetch_array($totjlhjamban0408); 
				$jumlahjlhjamban0408=$jlhtotjlhjamban0408[totjlhjlhjamban0408];
				$totjumlahjlhjamban0408=number_format($jumlahjlhjamban0408,0,",",".");
			echo "$totjumlahjlhjamban0408";
 } ?>