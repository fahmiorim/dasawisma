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
	  
		  
			$totibumenyusui0105 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0105 from keluarga where kodekel='0105'");
				$jlhtotibumenyusui0105=pg_fetch_array($totibumenyusui0105); 
				$jumlahibumenyusui0105=$jlhtotibumenyusui0105[totjlhibumenyusui0105];
				$totjumlahibumenyusui0105=number_format($jumlahibumenyusui0105,0,",",".");
			echo "$totjumlahibumenyusui0105";
 } ?>