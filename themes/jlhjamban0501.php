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
	  
		  
			$totjlhjamban0501 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0501 from keluarga where kodekel='0501'");
				$jlhtotjlhjamban0501=pg_fetch_array($totjlhjamban0501); 
				$jumlahjlhjamban0501=$jlhtotjlhjamban0501[totjlhjlhjamban0501];
				$totjumlahjlhjamban0501=number_format($jumlahjlhjamban0501,0,",",".");
			echo "$totjumlahjlhjamban0501";
 } ?>