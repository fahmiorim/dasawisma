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
	  
		  
			$totjlhjamban0106 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0106 from keluarga where kodekel='0106'");
				$jlhtotjlhjamban0106=pg_fetch_array($totjlhjamban0106); 
				$jumlahjlhjamban0106=$jlhtotjlhjamban0106[totjlhjlhjamban0106];
				$totjumlahjlhjamban0106=number_format($jumlahjlhjamban0106,0,",",".");
			echo "$totjumlahjlhjamban0106";
 } ?>