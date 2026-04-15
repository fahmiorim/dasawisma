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
	  
		  
			$totjlhjamban0205 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0205 from keluarga where kodekel='0205'");
				$jlhtotjlhjamban0205=pg_fetch_array($totjlhjamban0205); 
				$jumlahjlhjamban0205=$jlhtotjlhjamban0205[totjlhjlhjamban0205];
				$totjumlahjlhjamban0205=number_format($jumlahjlhjamban0205,0,",",".");
			echo "$totjumlahjlhjamban0205";
 } ?>