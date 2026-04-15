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
	  
		  
			$totibumenyusui0204 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0204 from keluarga where kodekel='0204'");
				$jlhtotibumenyusui0204=pg_fetch_array($totibumenyusui0204); 
				$jumlahibumenyusui0204=$jlhtotibumenyusui0204[totjlhibumenyusui0204];
				$totjumlahibumenyusui0204=number_format($jumlahibumenyusui0204,0,",",".");
			echo "$totjumlahibumenyusui0204";
 } ?>