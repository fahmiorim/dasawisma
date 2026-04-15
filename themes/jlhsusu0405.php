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
	  
		  
			$totibumenyusui0405 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0405 from keluarga where kodekel='0405'");
				$jlhtotibumenyusui0405=pg_fetch_array($totibumenyusui0405); 
				$jumlahibumenyusui0405=$jlhtotibumenyusui0405[totjlhibumenyusui0405];
				$totjumlahibumenyusui0405=number_format($jumlahibumenyusui0405,0,",",".");
			echo "$totjumlahibumenyusui0405";
 } ?>