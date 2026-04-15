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
	  
		  
			$totjlhjamban0103 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0103 from keluarga where kodekel='0103'");
				$jlhtotjlhjamban0103=pg_fetch_array($totjlhjamban0103); 
				$jumlahjlhjamban0103=$jlhtotjlhjamban0103[totjlhjlhjamban0103];
				$totjumlahjlhjamban0103=number_format($jumlahjlhjamban0103,0,",",".");
			echo "$totjumlahjlhjamban0103";
 } ?>