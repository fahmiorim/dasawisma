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
	  
		  
			$totjlhjamban0409 =pg_query($koneksi, "select sum(jlhjamban) as totjlhjlhjamban0409 from keluarga where kodekel='0409'");
				$jlhtotjlhjamban0409=pg_fetch_array($totjlhjamban0409); 
				$jumlahjlhjamban0409=$jlhtotjlhjamban0409[totjlhjlhjamban0409];
				$totjumlahjlhjamban0409=number_format($jumlahjlhjamban0409,0,",",".");
			echo "$totjumlahjlhjamban0409";
 } ?>