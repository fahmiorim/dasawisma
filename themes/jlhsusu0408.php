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
	  
		  
			$totibumenyusui0408 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0408 from keluarga where kodekel='0408'");
				$jlhtotibumenyusui0408=pg_fetch_array($totibumenyusui0408); 
				$jumlahibumenyusui0408=$jlhtotibumenyusui0408[totjlhibumenyusui0408];
				$totjumlahibumenyusui0408=number_format($jumlahibumenyusui0408,0,",",".");
			echo "$totjumlahibumenyusui0408";
 } ?>