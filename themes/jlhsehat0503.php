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
	  
		  
		$totrumah0503 =pg_query($koneksi, "select count(rumah) as totjlhrumah0503 from keluarga where kodekel='0503' and rumah='Sehat'");
		$jlhtotrumah0503=pg_fetch_array($totrumah0503); 
		$jumlahrumah0503=$jlhtotrumah0503[totjlhrumah0503];
		$totjumlahrumah0503=number_format($jumlahrumah0503,0,",",".");
		echo "$totjumlahrumah0503";
 } ?>