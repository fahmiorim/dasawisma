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
	  
		  
$totnosehat0403 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0403 from keluarga where kodekel='0403' and rumah='Kurang Sehat'");
		$jlhtotnosehat0403=pg_fetch_array($totnosehat0403); 
		$jumlahnosehat0403=$jlhtotnosehat0403[totjlhnosehat0403];
		$totjumlahnosehat0403=number_format($jumlahnosehat0403,0,",",".");
		echo "$totjumlahnosehat0403";
 } ?>