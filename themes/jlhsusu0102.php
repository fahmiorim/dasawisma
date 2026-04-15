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
	  
		  
			$totibumenyusui0102 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0102 from keluarga where kodekel='0102'");
				$jlhtotibumenyusui0102=pg_fetch_array($totibumenyusui0102); 
				$jumlahibumenyusui0102=$jlhtotibumenyusui0102[totjlhibumenyusui0102];
				$totjumlahibumenyusui0102=number_format($jumlahibumenyusui0102,0,",",".");
			echo "$totjumlahibumenyusui0102";
 } ?>