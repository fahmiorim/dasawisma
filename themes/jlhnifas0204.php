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
	  
		  
			$totnifas0204 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0204 from kehamilan where kodekel='0204'");
						$jlhtotnifas0204=pg_fetch_array($totnifas0204); 
						$jumlahnifas0204=$jlhtotnifas0204[totjlhnifas0204];
						$totjumlahnifas0204=number_format($jumlahnifas0204,0,",",".");
					echo "$totjumlahnifas0204";
 } ?>