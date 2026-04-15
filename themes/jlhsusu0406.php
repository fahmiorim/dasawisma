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
	  
		  
			$totibumenyusui0406 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0406 from keluarga where kodekel='0406'");
				$jlhtotibumenyusui0406=pg_fetch_array($totibumenyusui0406); 
				$jumlahibumenyusui0406=$jlhtotibumenyusui0406[totjlhibumenyusui0406];
				$totjumlahibumenyusui0406=number_format($jumlahibumenyusui0406,0,",",".");
			echo "$totjumlahibumenyusui0406";
 } ?>