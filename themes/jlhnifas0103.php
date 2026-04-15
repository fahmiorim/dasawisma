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
	  
		  
			$totnifas0103 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0103 from kehamilan where kodekel='0103'");
						$jlhtotnifas0103=pg_fetch_array($totnifas0103); 
						$jumlahnifas0103=$jlhtotnifas0103[totjlhnifas0103];
						$totjumlahnifas0103=number_format($jumlahnifas0103,0,",",".");
					echo "$totjumlahnifas0103";
 } ?>