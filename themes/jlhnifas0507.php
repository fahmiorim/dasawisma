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
	  
		  
			$totnifas0507 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0507 from kehamilan where kodekel='0507'");
						$jlhtotnifas0507=pg_fetch_array($totnifas0507); 
						$jumlahnifas0507=$jlhtotnifas0507[totjlhnifas0507];
						$totjumlahnifas0507=number_format($jumlahnifas0507,0,",",".");
					echo "$totjumlahnifas0507";
 } ?>