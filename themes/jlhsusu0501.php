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
	  
		  
			$totibumenyusui0501 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0501 from keluarga where kodekel='0501'");
				$jlhtotibumenyusui0501=pg_fetch_array($totibumenyusui0501); 
				$jumlahibumenyusui0501=$jlhtotibumenyusui0501[totjlhibumenyusui0501];
				$totjumlahibumenyusui0501=number_format($jumlahibumenyusui0501,0,",",".");
			echo "$totjumlahibumenyusui0501";
 } ?>