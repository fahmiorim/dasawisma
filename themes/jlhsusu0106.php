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
	  
		  
			$totibumenyusui0106 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0106 from keluarga where kodekel='0106'");
				$jlhtotibumenyusui0106=pg_fetch_array($totibumenyusui0106); 
				$jumlahibumenyusui0106=$jlhtotibumenyusui0106[totjlhibumenyusui0106];
				$totjumlahibumenyusui0106=number_format($jumlahibumenyusui0106,0,",",".");
			echo "$totjumlahibumenyusui0106";
 } ?>