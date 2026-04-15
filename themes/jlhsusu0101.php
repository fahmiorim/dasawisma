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
	  
		  
			$totibumenyusui0101 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0101 from keluarga where kodekel='0101'");
				$jlhtotibumenyusui0101=pg_fetch_array($totibumenyusui0101); 
				$jumlahibumenyusui0101=$jlhtotibumenyusui0101[totjlhibumenyusui0101];
				$totjumlahibumenyusui0101=number_format($jumlahibumenyusui0101,0,",",".");
			echo "$totjumlahibumenyusui0101";
 } ?>