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
	  
		  
			$totnifas0301 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0301 from kehamilan where kodekel='0301'");
						$jlhtotnifas0301=pg_fetch_array($totnifas0301); 
						$jumlahnifas0301=$jlhtotnifas0301[totjlhnifas0301];
						$totjumlahnifas0301=number_format($jumlahnifas0301,0,",",".");
					echo "$totjumlahnifas0301";
 } ?>