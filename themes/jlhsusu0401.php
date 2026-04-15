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
	  
		  
			$totibumenyusui0401 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0401 from keluarga where kodekel='0401'");
				$jlhtotibumenyusui0401=pg_fetch_array($totibumenyusui0401); 
				$jumlahibumenyusui0401=$jlhtotibumenyusui0401[totjlhibumenyusui0401];
				$totjumlahibumenyusui0401=number_format($jumlahibumenyusui0401,0,",",".");
			echo "$totjumlahibumenyusui0401";
 } ?>