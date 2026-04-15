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
	  
		  
			$totibumenyusui0304 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0304 from keluarga where kodekel='0304'");
				$jlhtotibumenyusui0304=pg_fetch_array($totibumenyusui0304); 
				$jumlahibumenyusui0304=$jlhtotibumenyusui0304[totjlhibumenyusui0304];
				$totjumlahibumenyusui0304=number_format($jumlahibumenyusui0304,0,",",".");
			echo "$totjumlahibumenyusui0304";
 } ?>