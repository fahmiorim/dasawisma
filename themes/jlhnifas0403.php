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
	  
		  
			$totnifas0403 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0403 from kehamilan where kodekel='0403'");
						$jlhtotnifas0403=pg_fetch_array($totnifas0403); 
						$jumlahnifas0403=$jlhtotnifas0403[totjlhnifas0403];
						$totjumlahnifas0403=number_format($jumlahnifas0403,0,",",".");
					echo "$totjumlahnifas0403";
 } ?>