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
	  
		  
			$totnifas0405 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0405 from kehamilan where kodekel='0405'");
						$jlhtotnifas0405=pg_fetch_array($totnifas0405); 
						$jumlahnifas0405=$jlhtotnifas0405[totjlhnifas0405];
						$totjumlahnifas0405=number_format($jumlahnifas0405,0,",",".");
					echo "$totjumlahnifas0405";
 } ?>