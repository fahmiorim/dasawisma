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
	  
		  
			$totnifas0305 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0305 from kehamilan where kodekel='0305'");
						$jlhtotnifas0305=pg_fetch_array($totnifas0305); 
						$jumlahnifas0305=$jlhtotnifas0305[totjlhnifas0305];
						$totjumlahnifas0305=number_format($jumlahnifas0305,0,",",".");
					echo "$totjumlahnifas0305";
 } ?>