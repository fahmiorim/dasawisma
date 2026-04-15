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
	  
		  
			$totnifas0304 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0304 from kehamilan where kodekel='0304'");
						$jlhtotnifas0304=pg_fetch_array($totnifas0304); 
						$jumlahnifas0304=$jlhtotnifas0304[totjlhnifas0304];
						$totjumlahnifas0304=number_format($jumlahnifas0304,0,",",".");
					echo "$totjumlahnifas0304";
 } ?>