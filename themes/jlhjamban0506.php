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
	  
		  
			$totjlhjamban0506 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0506 from keluarga where kodekel='0506'");
				$jlhtotjlhjamban0506=pg_fetch_array($totjlhjamban0506); 
				$jumlahjlhjamban0506=$jlhtotjlhjamban0506[totjlhjlhjamban0506];
				$totjumlahjlhjamban0506=number_format($jumlahjlhjamban0506,0,",",".");
			echo "$totjumlahjlhjamban0506";
 } ?>