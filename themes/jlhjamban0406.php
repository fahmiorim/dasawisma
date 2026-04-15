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
	  
		  
			$totjlhjamban0406 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0406 from keluarga where kodekel='0406'");
				$jlhtotjlhjamban0406=pg_fetch_array($totjlhjamban0406); 
				$jumlahjlhjamban0406=$jlhtotjlhjamban0406[totjlhjlhjamban0406];
				$totjumlahjlhjamban0406=number_format($jumlahjlhjamban0406,0,",",".");
			echo "$totjumlahjlhjamban0406";
 } ?>