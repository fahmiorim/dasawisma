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
	  
		  
			$totnifas0503 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0503 from kehamilan where kodekel='0503'");
						$jlhtotnifas0503=pg_fetch_array($totnifas0503); 
						$jumlahnifas0503=$jlhtotnifas0503[totjlhnifas0503];
						$totjumlahnifas0503=number_format($jumlahnifas0503,0,",",".");
					echo "$totjumlahnifas0503";
 } ?>