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
	  
		  
		$totrumah0408 =pg_query($koneksi, "select count(rumah) as totjlhrumah0408 from keluarga where kodekel='0408' and rumah='Sehat'");
		$jlhtotrumah0408=pg_fetch_array($totrumah0408); 
		$jumlahrumah0408=$jlhtotrumah0408[totjlhrumah0408];
		$totjumlahrumah0408=number_format($jumlahrumah0408,0,",",".");
		echo "$totjumlahrumah0408";
 } ?>