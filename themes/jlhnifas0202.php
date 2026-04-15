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
	  
		  
			$totnifas0202 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0202 from kehamilan where kodekel='0202'");
						$jlhtotnifas0202=pg_fetch_array($totnifas0202); 
						$jumlahnifas0202=$jlhtotnifas0202[totjlhnifas0202];
						$totjumlahnifas0202=number_format($jumlahnifas0202,0,",",".");
					echo "$totjumlahnifas0202";
 } ?>