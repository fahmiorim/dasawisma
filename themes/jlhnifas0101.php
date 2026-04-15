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
	  
		  
			$totnifas0101 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0101 from kehamilan where kodekel='0101'");
						$jlhtotnifas0101=pg_fetch_array($totnifas0101); 
						$jumlahnifas0101=$jlhtotnifas0101[totjlhnifas0101];
						$totjumlahnifas0101=number_format($jumlahnifas0101,0,",",".");
					echo "$totjumlahnifas0101";
 } ?>