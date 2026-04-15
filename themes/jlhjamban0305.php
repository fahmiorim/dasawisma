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
	  
		  
			$totjlhjamban0305 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0305 from keluarga where kodekel='0305'");
				$jlhtotjlhjamban0305=pg_fetch_array($totjlhjamban0305); 
				$jumlahjlhjamban0305=$jlhtotjlhjamban0305[totjlhjlhjamban0305];
				$totjumlahjlhjamban0305=number_format($jumlahjlhjamban0305,0,",",".");
			echo "$totjumlahjlhjamban0305";
 } ?>