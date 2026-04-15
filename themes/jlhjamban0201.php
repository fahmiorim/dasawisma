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
	  
		  
			$totjlhjamban0201 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0201 from keluarga where kodekel='0201'");
				$jlhtotjlhjamban0201=pg_fetch_array($totjlhjamban0201); 
				$jumlahjlhjamban0201=$jlhtotjlhjamban0201[totjlhjlhjamban0201];
				$totjumlahjlhjamban0201=number_format($jumlahjlhjamban0201,0,",",".");
			echo "$totjumlahjlhjamban0201";
 } ?>