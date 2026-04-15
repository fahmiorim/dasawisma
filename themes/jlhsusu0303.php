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
	  
		  
			$totibumenyusui0303 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0303 from keluarga where kodekel='0303'");
				$jlhtotibumenyusui0303=pg_fetch_array($totibumenyusui0303); 
				$jumlahibumenyusui0303=$jlhtotibumenyusui0303[totjlhibumenyusui0303];
				$totjumlahibumenyusui0303=number_format($jumlahibumenyusui0303,0,",",".");
			echo "$totjumlahibumenyusui0303";
 } ?>