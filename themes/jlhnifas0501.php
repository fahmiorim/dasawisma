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
	  
		  
			$totnifas0501 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0501 from kehamilan where kodekel='0501'");
						$jlhtotnifas0501=pg_fetch_array($totnifas0501); 
						$jumlahnifas0501=$jlhtotnifas0501[totjlhnifas0501];
						$totjumlahnifas0501=number_format($jumlahnifas0501,0,",",".");
					echo "$totjumlahnifas0501";
 } ?>