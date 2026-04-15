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
	  
		  
			$totibumenyusui0507 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0507 from keluarga where kodekel='0507'");
				$jlhtotibumenyusui0507=pg_fetch_array($totibumenyusui0507); 
				$jumlahibumenyusui0507=$jlhtotibumenyusui0507[totjlhibumenyusui0507];
				$totjumlahibumenyusui0507=number_format($jumlahibumenyusui0507,0,",",".");
			echo "$totjumlahibumenyusui0507";
 } ?>