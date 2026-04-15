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
	  
		  
			$totibumenyusui0307 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0307 from keluarga where kodekel='0307'");
				$jlhtotibumenyusui0307=pg_fetch_array($totibumenyusui0307); 
				$jumlahibumenyusui0307=$jlhtotibumenyusui0307[totjlhibumenyusui0307];
				$totjumlahibumenyusui0307=number_format($jumlahibumenyusui0307,0,",",".");
			echo "$totjumlahibumenyusui0307";
 } ?>