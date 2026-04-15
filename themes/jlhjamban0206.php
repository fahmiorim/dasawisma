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
	  
		  
			$totjlhjamban0206 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0206 from keluarga where kodekel='0206'");
				$jlhtotjlhjamban0206=pg_fetch_array($totjlhjamban0206); 
				$jumlahjlhjamban0206=$jlhtotjlhjamban0206[totjlhjlhjamban0206];
				$totjumlahjlhjamban0206=number_format($jumlahjlhjamban0206,0,",",".");
			echo "$totjumlahjlhjamban0206";
 } ?>