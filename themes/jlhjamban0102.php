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
	  
		  
			$totjlhjamban0102 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0102 from keluarga where kodekel='0102'");
				$jlhtotjlhjamban0102=pg_fetch_array($totjlhjamban0102); 
				$jumlahjlhjamban0102=$jlhtotjlhjamban0102[totjlhjlhjamban0102];
				$totjumlahjlhjamban0102=number_format($jumlahjlhjamban0102,0,",",".");
			echo "$totjumlahjlhjamban0102";
 } ?>