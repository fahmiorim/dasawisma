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
	  
		  
			$totjlhjamban0207 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0207 from keluarga where kodekel='0207'");
				$jlhtotjlhjamban0207=pg_fetch_array($totjlhjamban0207); 
				$jumlahjlhjamban0207=$jlhtotjlhjamban0207[totjlhjlhjamban0207];
				$totjumlahjlhjamban0207=number_format($jumlahjlhjamban0207,0,",",".");
			echo "$totjumlahjlhjamban0207";
 } ?>