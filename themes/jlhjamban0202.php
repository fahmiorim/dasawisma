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
	  
		  
			$totjlhjamban0202 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0202 from keluarga where kodekel='0202'");
				$jlhtotjlhjamban0202=pg_fetch_array($totjlhjamban0202); 
				$jumlahjlhjamban0202=$jlhtotjlhjamban0202[totjlhjlhjamban0202];
				$totjumlahjlhjamban0202=number_format($jumlahjlhjamban0202,0,",",".");
			echo "$totjumlahjlhjamban0202";
 } ?>