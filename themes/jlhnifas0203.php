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
	  
		  
			$totnifas0203 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0203 from kehamilan where kodekel='0203'");
						$jlhtotnifas0203=pg_fetch_array($totnifas0203); 
						$jumlahnifas0203=$jlhtotnifas0203[totjlhnifas0203];
						$totjumlahnifas0203=number_format($jumlahnifas0203,0,",",".");
					echo "$totjumlahnifas0203";
 } ?>