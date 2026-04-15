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
	  
		  
			$totnifas0205 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0205 from kehamilan where kodekel='0205'");
						$jlhtotnifas0205=pg_fetch_array($totnifas0205); 
						$jumlahnifas0205=$jlhtotnifas0205[totjlhnifas0205];
						$totjumlahnifas0205=number_format($jumlahnifas0205,0,",",".");
					echo "$totjumlahnifas0205";
 } ?>