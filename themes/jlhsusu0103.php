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
	  
		  
			$totibumenyusui0103 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0103 from keluarga where kodekel='0103'");
				$jlhtotibumenyusui0103=pg_fetch_array($totibumenyusui0103); 
				$jumlahibumenyusui0103=$jlhtotibumenyusui0103[totjlhibumenyusui0103];
				$totjumlahibumenyusui0103=number_format($jumlahibumenyusui0103,0,",",".");
			echo "$totjumlahibumenyusui0103";
 } ?>