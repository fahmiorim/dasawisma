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
	  
		  
			$totibumenyusui0305 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0305 from keluarga where kodekel='0305'");
				$jlhtotibumenyusui0305=pg_fetch_array($totibumenyusui0305); 
				$jumlahibumenyusui0305=$jlhtotibumenyusui0305[totjlhibumenyusui0305];
				$totjumlahibumenyusui0305=number_format($jumlahibumenyusui0305,0,",",".");
			echo "$totjumlahibumenyusui0305";
 } ?>