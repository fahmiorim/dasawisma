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
	  
		  
			$totnifas0408 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0408 from kehamilan where kodekel='0408'");
						$jlhtotnifas0408=pg_fetch_array($totnifas0408); 
						$jumlahnifas0408=$jlhtotnifas0408[totjlhnifas0408];
						$totjumlahnifas0408=number_format($jumlahnifas0408,0,",",".");
					echo "$totjumlahnifas0408";
 } ?>