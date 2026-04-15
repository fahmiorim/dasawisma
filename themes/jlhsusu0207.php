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
	  
		  
			$totibumenyusui0207 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0207 from keluarga where kodekel='0207'");
				$jlhtotibumenyusui0207=pg_fetch_array($totibumenyusui0207); 
				$jumlahibumenyusui0207=$jlhtotibumenyusui0207[totjlhibumenyusui0207];
				$totjumlahibumenyusui0207=number_format($jumlahibumenyusui0207,0,",",".");
			echo "$totjumlahibumenyusui0207";
 } ?>