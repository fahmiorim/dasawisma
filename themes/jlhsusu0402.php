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
	  
		  
			$totibumenyusui0402 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0402 from keluarga where kodekel='0402'");
				$jlhtotibumenyusui0402=pg_fetch_array($totibumenyusui0402); 
				$jumlahibumenyusui0402=$jlhtotibumenyusui0402[totjlhibumenyusui0402];
				$totjumlahibumenyusui0402=number_format($jumlahibumenyusui0402,0,",",".");
			echo "$totjumlahibumenyusui0402";
 } ?>