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
	  
		  
			$totjlhjamban0507 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0507 from keluarga where kodekel='0507'");
				$jlhtotjlhjamban0507=pg_fetch_array($totjlhjamban0507); 
				$jumlahjlhjamban0507=$jlhtotjlhjamban0507[totjlhjlhjamban0507];
				$totjumlahjlhjamban0507=number_format($jumlahjlhjamban0507,0,",",".");
			echo "$totjumlahjlhjamban0507";
 } ?>