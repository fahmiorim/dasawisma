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
	  
		  
			$totibumenyusui0202 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0202 from keluarga where kodekel='0202'");
				$jlhtotibumenyusui0202=pg_fetch_array($totibumenyusui0202); 
				$jumlahibumenyusui0202=$jlhtotibumenyusui0202[totjlhibumenyusui0202];
				$totjumlahibumenyusui0202=number_format($jumlahibumenyusui0202,0,",",".");
			echo "$totjumlahibumenyusui0202";
 } ?>