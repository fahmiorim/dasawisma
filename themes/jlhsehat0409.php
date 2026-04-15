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
	  
		  
		$totrumah0409 =pg_query($koneksi, "select count(rumah) as totjlhrumah0409 from keluarga where kodekel='0409' and rumah='Sehat'");
		$jlhtotrumah0409=pg_fetch_array($totrumah0409); 
		$jumlahrumah0409=$jlhtotrumah0409[totjlhrumah0409];
		$totjumlahrumah0409=number_format($jumlahrumah0409,0,",",".");
		echo "$totjumlahrumah0409";
 } ?>