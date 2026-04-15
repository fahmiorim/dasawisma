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
	  
		  
			$totnifas0409 =pg_query($koneksi, "select sum(jlhnifas) as totjlhnifas0409 from kehamilan where kodekel='0409'");
						$jlhtotnifas0409=pg_fetch_array($totnifas0409); 
						$jumlahnifas0409=$jlhtotnifas0409[totjlhnifas0409];
						$totjumlahnifas0409=number_format($jumlahnifas0409,0,",",".");
					echo "$totjumlahnifas0409";
 } ?>