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
	  
		  
			$totibumenyusui0508 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0508 from keluarga where kodekel='0508'");
				$jlhtotibumenyusui0508=pg_fetch_array($totibumenyusui0508); 
				$jumlahibumenyusui0508=$jlhtotibumenyusui0508[totjlhibumenyusui0508];
				$totjumlahibumenyusui0508=number_format($jumlahibumenyusui0508,0,",",".");
			echo "$totjumlahibumenyusui0508";
 } ?>