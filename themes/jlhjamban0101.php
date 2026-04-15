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
	  
		  
			$totjlhjamban0101 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0101 from keluarga where kodekel='0101'");
				$jlhtotjlhjamban0101=pg_fetch_array($totjlhjamban0101); 
				$jumlahjlhjamban0101=$jlhtotjlhjamban0101[totjlhjlhjamban0101];
				$totjumlahjlhjamban0101=number_format($jumlahjlhjamban0101,0,",",".");
			echo "$totjumlahjlhjamban0101";
 } ?>