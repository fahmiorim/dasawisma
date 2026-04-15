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
	  
		  
		$totrumah0401 =pg_query($koneksi, "select count(rumah) as totjlhrumah0401 from keluarga where kodekel='0401' and rumah='Sehat'");
		$jlhtotrumah0401=pg_fetch_array($totrumah0401); 
		$jumlahrumah0401=$jlhtotrumah0401[totjlhrumah0401];
		$totjumlahrumah0401=number_format($jumlahrumah0401,0,",",".");
		echo "$totjumlahrumah0401";
 } ?>