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
	  
		  
			$totjlhjamban0302 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0302 from keluarga where kodekel='0302'");
				$jlhtotjlhjamban0302=pg_fetch_array($totjlhjamban0302); 
				$jumlahjlhjamban0302=$jlhtotjlhjamban0302[totjlhjlhjamban0302];
				$totjumlahjlhjamban0302=number_format($jumlahjlhjamban0302,0,",",".");
			echo "$totjumlahjlhjamban0302";
 } ?>