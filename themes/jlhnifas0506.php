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
	  
		  
			$totnifas0506 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0506 from kehamilan where kodekel='0506'");
						$jlhtotnifas0506=pg_fetch_array($totnifas0506); 
						$jumlahnifas0506=$jlhtotnifas0506[totjlhnifas0506];
						$totjumlahnifas0506=number_format($jumlahnifas0506,0,",",".");
					echo "$totjumlahnifas0506";
 } ?>