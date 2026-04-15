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
	  
		  
			$totibumenyusui0407 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0407 from keluarga where kodekel='0407'");
				$jlhtotibumenyusui0407=pg_fetch_array($totibumenyusui0407); 
				$jumlahibumenyusui0407=$jlhtotibumenyusui0407[totjlhibumenyusui0407];
				$totjumlahibumenyusui0407=number_format($jumlahibumenyusui0407,0,",",".");
			echo "$totjumlahibumenyusui0407";
 } ?>