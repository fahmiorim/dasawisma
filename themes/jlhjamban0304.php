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
	  
		  
			$totjlhjamban0304 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0304 from keluarga where kodekel='0304'");
				$jlhtotjlhjamban0304=pg_fetch_array($totjlhjamban0304); 
				$jumlahjlhjamban0304=$jlhtotjlhjamban0304[totjlhjlhjamban0304];
				$totjumlahjlhjamban0304=number_format($jumlahjlhjamban0304,0,",",".");
			echo "$totjumlahjlhjamban0304";
 } ?>