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
	  
		  
			$totnifas0104 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0104 from kehamilan where kodekel='0104'");
						$jlhtotnifas0104=pg_fetch_array($totnifas0104); 
						$jumlahnifas0104=$jlhtotnifas0104[totjlhnifas0104];
						$totjumlahnifas0104=number_format($jumlahnifas0104,0,",",".");
					echo "$totjumlahnifas0104";
 } ?>