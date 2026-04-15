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
	  
		  
			$totibumenyusui0504 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0504 from keluarga where kodekel='0504'");
				$jlhtotibumenyusui0504=pg_fetch_array($totibumenyusui0504); 
				$jumlahibumenyusui0504=$jlhtotibumenyusui0504[totjlhibumenyusui0504];
				$totjumlahibumenyusui0504=number_format($jumlahibumenyusui0504,0,",",".");
			echo "$totjumlahibumenyusui0504";
 } ?>