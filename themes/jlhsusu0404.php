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
	  
		  
			$totibumenyusui0404 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0404 from keluarga where kodekel='0404'");
				$jlhtotibumenyusui0404=pg_fetch_array($totibumenyusui0404); 
				$jumlahibumenyusui0404=$jlhtotibumenyusui0404[totjlhibumenyusui0404];
				$totjumlahibumenyusui0404=number_format($jumlahibumenyusui0404,0,",",".");
			echo "$totjumlahibumenyusui0404";
 } ?>