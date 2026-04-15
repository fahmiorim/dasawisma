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
	  
		  
			$totjlhjamban0407 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0407 from keluarga where kodekel='0407'");
				$jlhtotjlhjamban0407=pg_fetch_array($totjlhjamban0407); 
				$jumlahjlhjamban0407=$jlhtotjlhjamban0407[totjlhjlhjamban0407];
				$totjumlahjlhjamban0407=number_format($jumlahjlhjamban0407,0,",",".");
			echo "$totjumlahjlhjamban0407";
 } ?>