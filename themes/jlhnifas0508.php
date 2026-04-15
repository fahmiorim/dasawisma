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
	  
		  
			$totnifas0508 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0508 from kehamilan where kodekel='0508'");
						$jlhtotnifas0508=pg_fetch_array($totnifas0508); 
						$jumlahnifas0508=$jlhtotnifas0508[totjlhnifas0508];
						$totjumlahnifas0508=number_format($jumlahnifas0508,0,",",".");
					echo "$totjumlahnifas0508";
 } ?>