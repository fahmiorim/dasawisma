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
	  
		  
			$totjlhjamban0404 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0404 from keluarga where kodekel='0404'");
				$jlhtotjlhjamban0404=pg_fetch_array($totjlhjamban0404); 
				$jumlahjlhjamban0404=$jlhtotjlhjamban0404[totjlhjlhjamban0404];
				$totjumlahjlhjamban0404=number_format($jumlahjlhjamban0404,0,",",".");
			echo "$totjumlahjlhjamban0404";
 } ?>