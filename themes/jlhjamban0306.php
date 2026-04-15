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
	  
		  
			$totjlhjamban0306 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0306 from keluarga where kodekel='0306'");
				$jlhtotjlhjamban0306=pg_fetch_array($totjlhjamban0306); 
				$jumlahjlhjamban0306=$jlhtotjlhjamban0306[totjlhjlhjamban0306];
				$totjumlahjlhjamban0306=number_format($jumlahjlhjamban0306,0,",",".");
			echo "$totjumlahjlhjamban0306";
 } ?>