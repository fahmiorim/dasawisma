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
	  
		  
			$totnifas0402 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0402 from kehamilan where kodekel='0402'");
						$jlhtotnifas0402=pg_fetch_array($totnifas0402); 
						$jumlahnifas0402=$jlhtotnifas0402[totjlhnifas0402];
						$totjumlahnifas0402=number_format($jumlahnifas0402,0,",",".");
					echo "$totjumlahnifas0402";
 } ?>