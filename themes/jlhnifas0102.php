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
	  
		  
			$totnifas0102 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0102 from kehamilan where kodekel='0102'");
						$jlhtotnifas0102=pg_fetch_array($totnifas0102); 
						$jumlahnifas0102=$jlhtotnifas0102[totjlhnifas0102];
						$totjumlahnifas0102=number_format($jumlahnifas0102,0,",",".");
					echo "$totjumlahnifas0102";
 } ?>