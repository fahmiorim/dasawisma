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
	  
		  
			$totnifas0404 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0404 from kehamilan where kodekel='0404'");
						$jlhtotnifas0404=pg_fetch_array($totnifas0404); 
						$jumlahnifas0404=$jlhtotnifas0404[totjlhnifas0404];
						$totjumlahnifas0404=number_format($jumlahnifas0404,0,",",".");
					echo "$totjumlahnifas0404";
 } ?>