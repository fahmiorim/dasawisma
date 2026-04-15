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
	  
		  
			$totnifas0201 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0201 from kehamilan where kodekel='0201'");
						$jlhtotnifas0201=pg_fetch_array($totnifas0201); 
						$jumlahnifas0201=$jlhtotnifas0201[totjlhnifas0201];
						$totjumlahnifas0201=number_format($jumlahnifas0201,0,",",".");
					echo "$totjumlahnifas0201";
 } ?>