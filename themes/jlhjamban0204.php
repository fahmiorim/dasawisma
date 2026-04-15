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
	  
		  
			$totjlhjamban0204 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0204 from keluarga where kodekel='0204'");
				$jlhtotjlhjamban0204=pg_fetch_array($totjlhjamban0204); 
				$jumlahjlhjamban0204=$jlhtotjlhjamban0204[totjlhjlhjamban0204];
				$totjumlahjlhjamban0204=number_format($jumlahjlhjamban0204,0,",",".");
			echo "$totjumlahjlhjamban0204";
 } ?>