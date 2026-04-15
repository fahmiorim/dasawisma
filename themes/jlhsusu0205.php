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
	  
		  
			$totibumenyusui0205 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0205 from keluarga where kodekel='0205'");
				$jlhtotibumenyusui0205=pg_fetch_array($totibumenyusui0205); 
				$jumlahibumenyusui0205=$jlhtotibumenyusui0205[totjlhibumenyusui0205];
				$totjumlahibumenyusui0205=number_format($jumlahibumenyusui0205,0,",",".");
			echo "$totjumlahibumenyusui0205";
 } ?>