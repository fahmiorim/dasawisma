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
	  
		  
			$totnifas0306 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0306 from kehamilan where kodekel='0306'");
						$jlhtotnifas0306=pg_fetch_array($totnifas0306); 
						$jumlahnifas0306=$jlhtotnifas0306[totjlhnifas0306];
						$totjumlahnifas0306=number_format($jumlahnifas0306,0,",",".");
					echo "$totjumlahnifas0306";
 } ?>