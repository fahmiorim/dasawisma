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
	  
		  
			$totnifas0406 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0406 from kehamilan where kodekel='0406'");
						$jlhtotnifas0406=pg_fetch_array($totnifas0406); 
						$jumlahnifas0406=$jlhtotnifas0406[totjlhnifas0406];
						$totjumlahnifas0406=number_format($jumlahnifas0406,0,",",".");
					echo "$totjumlahnifas0406";
 } ?>