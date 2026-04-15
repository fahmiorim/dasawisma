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
	  
		  
			$totnifas0302 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0302 from kehamilan where kodekel='0302'");
						$jlhtotnifas0302=pg_fetch_array($totnifas0302); 
						$jumlahnifas0302=$jlhtotnifas0302[totjlhnifas0302];
						$totjumlahnifas0302=number_format($jumlahnifas0302,0,",",".");
					echo "$totjumlahnifas0302";
 } ?>