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
	  
		  
			$totibumenyusui0302 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0302 from keluarga where kodekel='0302'");
				$jlhtotibumenyusui0302=pg_fetch_array($totibumenyusui0302); 
				$jumlahibumenyusui0302=$jlhtotibumenyusui0302[totjlhibumenyusui0302];
				$totjumlahibumenyusui0302=number_format($jumlahibumenyusui0302,0,",",".");
			echo "$totjumlahibumenyusui0302";
 } ?>