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
	  
		  
			$totibumenyusui0104 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0104 from keluarga where kodekel='0104'");
				$jlhtotibumenyusui0104=pg_fetch_array($totibumenyusui0104); 
				$jumlahibumenyusui0104=$jlhtotibumenyusui0104[totjlhibumenyusui0104];
				$totjumlahibumenyusui0104=number_format($jumlahibumenyusui0104,0,",",".");
			echo "$totjumlahibumenyusui0104";
 } ?>