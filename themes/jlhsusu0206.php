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
	  
		  
			$totibumenyusui0206 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0206 from keluarga where kodekel='0206'");
				$jlhtotibumenyusui0206=pg_fetch_array($totibumenyusui0206); 
				$jumlahibumenyusui0206=$jlhtotibumenyusui0206[totjlhibumenyusui0206];
				$totjumlahibumenyusui0206=number_format($jumlahibumenyusui0206,0,",",".");
			echo "$totjumlahibumenyusui0206";
 } ?>