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
	  
		  
			$totnifas0504 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0504 from kehamilan where kodekel='0504'");
						$jlhtotnifas0504=pg_fetch_array($totnifas0504); 
						$jumlahnifas0504=$jlhtotnifas0504[totjlhnifas0504];
						$totjumlahnifas0504=number_format($jumlahnifas0504,0,",",".");
					echo "$totjumlahnifas0504";
 } ?>