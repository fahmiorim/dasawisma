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
	  
		  
			$totibumenyusui0409 =pg_query($koneksi, "select sum(ibumenyusui) as totjlhibumenyusui0409 from keluarga where kodekel='0409'");
				$jlhtotibumenyusui0409=pg_fetch_array($totibumenyusui0409); 
				$jumlahibumenyusui0409=$jlhtotibumenyusui0409[totjlhibumenyusui0409];
				$totjumlahibumenyusui0409=number_format($jumlahibumenyusui0409,0,",",".");
			echo "$totjumlahibumenyusui0409";
 } ?>