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
	  
		  
			$totibumenyusui0503 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0503 from keluarga where kodekel='0503'");
				$jlhtotibumenyusui0503=pg_fetch_array($totibumenyusui0503); 
				$jumlahibumenyusui0503=$jlhtotibumenyusui0503[totjlhibumenyusui0503];
				$totjumlahibumenyusui0503=number_format($jumlahibumenyusui0503,0,",",".");
			echo "$totjumlahibumenyusui0503";
 } ?>