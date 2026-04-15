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
	  
		  
		$totrumah0405 =pg_query($koneksi, "select count(rumah) as totjlhrumah0405 from keluarga where kodekel='0405' and rumah='Sehat'");
		$jlhtotrumah0405=pg_fetch_array($totrumah0405); 
		$jumlahrumah0405=$jlhtotrumah0405[totjlhrumah0405];
		$totjumlahrumah0405=number_format($jumlahrumah0405,0,",",".");
		echo "$totjumlahrumah0405";
 } ?>