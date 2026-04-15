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
	  
		  
			$totnifas0105 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0105 from kehamilan where kodekel='0105'");
						$jlhtotnifas0105=pg_fetch_array($totnifas0105); 
						$jumlahnifas0105=$jlhtotnifas0105[totjlhnifas0105];
						$totjumlahnifas0105=number_format($jumlahnifas0105,0,",",".");
					echo "$totjumlahnifas0105";
 } ?>