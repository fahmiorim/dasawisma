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
	  
		  
			$totnifas0106 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0106 from kehamilan where kodekel='0106'");
						$jlhtotnifas0106=pg_fetch_array($totnifas0106); 
						$jumlahnifas0106=$jlhtotnifas0106[totjlhnifas0106];
						$totjumlahnifas0106=number_format($jumlahnifas0106,0,",",".");
					echo "$totjumlahnifas0106";
 } ?>