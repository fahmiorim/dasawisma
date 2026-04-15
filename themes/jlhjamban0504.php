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
	  
		  
			$totjlhjamban0504 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0504 from keluarga where kodekel='0504'");
				$jlhtotjlhjamban0504=pg_fetch_array($totjlhjamban0504); 
				$jumlahjlhjamban0504=$jlhtotjlhjamban0504[totjlhjlhjamban0504];
				$totjumlahjlhjamban0504=number_format($jumlahjlhjamban0504,0,",",".");
			echo "$totjumlahjlhjamban0504";
 } ?>