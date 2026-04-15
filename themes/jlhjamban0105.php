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
	  
		  
			$totjlhjamban0105 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0105 from keluarga where kodekel='0105'");
				$jlhtotjlhjamban0105=pg_fetch_array($totjlhjamban0105); 
				$jumlahjlhjamban0105=$jlhtotjlhjamban0105[totjlhjlhjamban0105];
				$totjumlahjlhjamban0105=number_format($jumlahjlhjamban0105,0,",",".");
			echo "$totjumlahjlhjamban0105";
 } ?>