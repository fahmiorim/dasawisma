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
	  
		  
			$totibumenyusui0403 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0403 from keluarga where kodekel='0403'");
				$jlhtotibumenyusui0403=pg_fetch_array($totibumenyusui0403); 
				$jumlahibumenyusui0403=$jlhtotibumenyusui0403[totjlhibumenyusui0403];
				$totjumlahibumenyusui0403=number_format($jumlahibumenyusui0403,0,",",".");
			echo "$totjumlahibumenyusui0403";
 } ?>