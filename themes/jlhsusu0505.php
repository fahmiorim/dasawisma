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
	  
		  
			$totibumenyusui0505 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0505 from keluarga where kodekel='0505'");
				$jlhtotibumenyusui0505=pg_fetch_array($totibumenyusui0505); 
				$jumlahibumenyusui0505=$jlhtotibumenyusui0505[totjlhibumenyusui0505];
				$totjumlahibumenyusui0505=number_format($jumlahibumenyusui0505,0,",",".");
			echo "$totjumlahibumenyusui0505";
 } ?>