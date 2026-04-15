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
	  
		  
			$totnifas0502 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0502 from kehamilan where kodekel='0502'");
						$jlhtotnifas0502=pg_fetch_array($totnifas0502); 
						$jumlahnifas0502=$jlhtotnifas0502[totjlhnifas0502];
						$totjumlahnifas0502=number_format($jumlahnifas0502,0,",",".");
					echo "$totjumlahnifas0502";
 } ?>