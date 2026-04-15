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
	  
		  
			$totibumenyusui0502 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0502 from keluarga where kodekel='0502'");
				$jlhtotibumenyusui0502=pg_fetch_array($totibumenyusui0502); 
				$jumlahibumenyusui0502=$jlhtotibumenyusui0502[totjlhibumenyusui0502];
				$totjumlahibumenyusui0502=number_format($jumlahibumenyusui0502,0,",",".");
			echo "$totjumlahibumenyusui0502";
 } ?>