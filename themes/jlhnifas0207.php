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
	  
		  
			$totnifas0207 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0207 from kehamilan where kodekel='0207'");
						$jlhtotnifas0207=pg_fetch_array($totnifas0207); 
						$jumlahnifas0207=$jlhtotnifas0207[totjlhnifas0207];
						$totjumlahnifas0207=number_format($jumlahnifas0207,0,",",".");
					echo "$totjumlahnifas0207";
 } ?>