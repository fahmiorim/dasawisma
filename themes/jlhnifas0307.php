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
	  
		  
			$totnifas0307 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0307 from kehamilan where kodekel='0307'");
						$jlhtotnifas0307=pg_fetch_array($totnifas0307); 
						$jumlahnifas0307=$jlhtotnifas0307[totjlhnifas0307];
						$totjumlahnifas0307=number_format($jumlahnifas0307,0,",",".");
					echo "$totjumlahnifas0307";
 } ?>