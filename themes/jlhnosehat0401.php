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
	  
		  
$totnosehat0401 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0401 from keluarga where kodekel='0401' and rumah='Kurang Sehat'");
		$jlhtotnosehat0401=pg_fetch_array($totnosehat0401); 
		$jumlahnosehat0401=$jlhtotnosehat0401[totjlhnosehat0401];
		$totjumlahnosehat0401=number_format($jumlahnosehat0401,0,",",".");
		echo "$totjumlahnosehat0401";
 } ?>