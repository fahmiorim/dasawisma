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
	  
		  
			$totnifas0407 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0407 from kehamilan where kodekel='0407'");
						$jlhtotnifas0407=pg_fetch_array($totnifas0407); 
						$jumlahnifas0407=$jlhtotnifas0407[totjlhnifas0407];
						$totjumlahnifas0407=number_format($jumlahnifas0407,0,",",".");
					echo "$totjumlahnifas0407";
 } ?>