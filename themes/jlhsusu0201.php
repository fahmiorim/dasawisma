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
	  
		  
			$totibumenyusui0201 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0201 from keluarga where kodekel='0201'");
				$jlhtotibumenyusui0201=pg_fetch_array($totibumenyusui0201); 
				$jumlahibumenyusui0201=$jlhtotibumenyusui0201[totjlhibumenyusui0201];
				$totjumlahibumenyusui0201=number_format($jumlahibumenyusui0201,0,",",".");
			echo "$totjumlahibumenyusui0201";
 } ?>