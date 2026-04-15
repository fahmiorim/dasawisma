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
	  
		  
			$totjlhjamban0307 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0307 from keluarga where kodekel='0307'");
				$jlhtotjlhjamban0307=pg_fetch_array($totjlhjamban0307); 
				$jumlahjlhjamban0307=$jlhtotjlhjamban0307[totjlhjlhjamban0307];
				$totjumlahjlhjamban0307=number_format($jumlahjlhjamban0307,0,",",".");
			echo "$totjumlahjlhjamban0307";
 } ?>