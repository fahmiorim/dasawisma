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
	  
		  
$totnosehat0409 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0409 from keluarga where kodekel='0409' and rumah='Kurang Sehat'");
		$jlhtotnosehat0409=pg_fetch_array($totnosehat0409); 
		$jumlahnosehat0409=$jlhtotnosehat0409[totjlhnosehat0409];
		$totjumlahnosehat0409=number_format($jumlahnosehat0409,0,",",".");
		echo "$totjumlahnosehat0409";
 } ?>