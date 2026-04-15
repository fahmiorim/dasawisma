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
	  
		  
			$totibumenyusui0203 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0203 from keluarga where kodekel='0203'");
				$jlhtotibumenyusui0203=pg_fetch_array($totibumenyusui0203); 
				$jumlahibumenyusui0203=$jlhtotibumenyusui0203[totjlhibumenyusui0203];
				$totjumlahibumenyusui0203=number_format($jumlahibumenyusui0203,0,",",".");
			echo "$totjumlahibumenyusui0203";
 } ?>