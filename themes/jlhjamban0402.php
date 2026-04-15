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
	  
		  
			$totjlhjamban0402 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0402 from keluarga where kodekel='0402'");
				$jlhtotjlhjamban0402=pg_fetch_array($totjlhjamban0402); 
				$jumlahjlhjamban0402=$jlhtotjlhjamban0402[totjlhjlhjamban0402];
				$totjumlahjlhjamban0402=number_format($jumlahjlhjamban0402,0,",",".");
			echo "$totjumlahjlhjamban0402";
 } ?>