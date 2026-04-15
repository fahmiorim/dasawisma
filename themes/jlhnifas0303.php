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
	  
		  
			$totnifas0303 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0303 from kehamilan where kodekel='0303'");
						$jlhtotnifas0303=pg_fetch_array($totnifas0303); 
						$jumlahnifas0303=$jlhtotnifas0303[totjlhnifas0303];
						$totjumlahnifas0303=number_format($jumlahnifas0303,0,",",".");
					echo "$totjumlahnifas0303";
 } ?>