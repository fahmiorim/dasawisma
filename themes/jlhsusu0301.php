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
	  
		  
			$totibumenyusui0301 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0301 from keluarga where kodekel='0301'");
				$jlhtotibumenyusui0301=pg_fetch_array($totibumenyusui0301); 
				$jumlahibumenyusui0301=$jlhtotibumenyusui0301[totjlhibumenyusui0301];
				$totjumlahibumenyusui0301=number_format($jumlahibumenyusui0301,0,",",".");
			echo "$totjumlahibumenyusui0301";
 } ?>