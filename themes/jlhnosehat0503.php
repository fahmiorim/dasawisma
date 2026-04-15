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
	  
		  
$totnosehat0503 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0503 from keluarga where kodekel='0503' and rumah='Kurang Sehat'");
		$jlhtotnosehat0503=pg_fetch_array($totnosehat0503); 
		$jumlahnosehat0503=$jlhtotnosehat0503[totjlhnosehat0503];
		$totjumlahnosehat0503=number_format($jumlahnosehat0503,0,",",".");
		echo "$totjumlahnosehat0503";
 } ?>