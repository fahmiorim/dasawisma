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
	  
		  
			$totnifas0206 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0206 from kehamilan where kodekel='0206'");
						$jlhtotnifas0206=pg_fetch_array($totnifas0206); 
						$jumlahnifas0206=$jlhtotnifas0206[totjlhnifas0206];
						$totjumlahnifas0206=number_format($jumlahnifas0206,0,",",".");
					echo "$totjumlahnifas0206";
 } ?>