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
	  
		  
			$totjlhjamban0104 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0104 from keluarga where kodekel='0104'");
				$jlhtotjlhjamban0104=pg_fetch_array($totjlhjamban0104); 
				$jumlahjlhjamban0104=$jlhtotjlhjamban0104[totjlhjlhjamban0104];
				$totjumlahjlhjamban0104=number_format($jumlahjlhjamban0104,0,",",".");
			echo "$totjumlahjlhjamban0104";
 } ?>