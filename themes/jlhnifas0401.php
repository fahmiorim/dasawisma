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
	  
		  
			$totnifas0401 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0401 from kehamilan where kodekel='0401'");
						$jlhtotnifas0401=pg_fetch_array($totnifas0401); 
						$jumlahnifas0401=$jlhtotnifas0401[totjlhnifas0401];
						$totjumlahnifas0401=number_format($jumlahnifas0401,0,",",".");
					echo "$totjumlahnifas0401";
 } ?>