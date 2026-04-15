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
	  
		  
			$totjlhjamban0303 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0303 from keluarga where kodekel='0303'");
				$jlhtotjlhjamban0303=pg_fetch_array($totjlhjamban0303); 
				$jumlahjlhjamban0303=$jlhtotjlhjamban0303[totjlhjlhjamban0303];
				$totjumlahjlhjamban0303=number_format($jumlahjlhjamban0303,0,",",".");
			echo "$totjumlahjlhjamban0303";
 } ?>