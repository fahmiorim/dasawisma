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
	  
		  
			$totnifas0505 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0505 from kehamilan where kodekel='0505'");
						$jlhtotnifas0505=pg_fetch_array($totnifas0505); 
						$jumlahnifas0505=$jlhtotnifas0505[totjlhnifas0505];
						$totjumlahnifas0505=number_format($jumlahnifas0505,0,",",".");
					echo "$totjumlahnifas0505";
 } ?>