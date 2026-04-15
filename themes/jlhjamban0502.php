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
	  
		  
			$totjlhjamban0502 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0502 from keluarga where kodekel='0502'");
				$jlhtotjlhjamban0502=pg_fetch_array($totjlhjamban0502); 
				$jumlahjlhjamban0502=$jlhtotjlhjamban0502[totjlhjlhjamban0502];
				$totjumlahjlhjamban0502=number_format($jumlahjlhjamban0502,0,",",".");
			echo "$totjumlahjlhjamban0502";
 } ?>