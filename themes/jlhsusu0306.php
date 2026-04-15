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
	  
		  
			$totibumenyusui0306 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0306 from keluarga where kodekel='0306'");
				$jlhtotibumenyusui0306=pg_fetch_array($totibumenyusui0306); 
				$jumlahibumenyusui0306=$jlhtotibumenyusui0306[totjlhibumenyusui0306];
				$totjumlahibumenyusui0306=number_format($jumlahibumenyusui0306,0,",",".");
			echo "$totjumlahibumenyusui0306";
 } ?>