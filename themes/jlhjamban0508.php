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
	  
		  
			$totjlhjamban0508 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0508 from keluarga where kodekel='0508'");
				$jlhtotjlhjamban0508=pg_fetch_array($totjlhjamban0508); 
				$jumlahjlhjamban0508=$jlhtotjlhjamban0508[totjlhjlhjamban0508];
				$totjumlahjlhjamban0508=number_format($jumlahjlhjamban0508,0,",",".");
			echo "$totjumlahjlhjamban0508";
 } ?>