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
	  
		  
			$totibumenyusui0506 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0506 from keluarga where kodekel='0506'");
				$jlhtotibumenyusui0506=pg_fetch_array($totibumenyusui0506); 
				$jumlahibumenyusui0506=$jlhtotibumenyusui0506[totjlhibumenyusui0506];
				$totjumlahibumenyusui0506=number_format($jumlahibumenyusui0506,0,",",".");
			echo "$totjumlahibumenyusui0506";
 } ?>