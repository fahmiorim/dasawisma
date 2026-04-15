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
	  
		  
$totnosehat0301 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0301 from keluarga where kodekel='0301' and rumah='Kurang Sehat'");
		$jlhtotnosehat0301=pg_fetch_array($totnosehat0301); 
		$jumlahnosehat0301=$jlhtotnosehat0301[totjlhnosehat0301];
		$totjumlahnosehat0301=number_format($jumlahnosehat0301,0,",",".");
		echo "$totjumlahnosehat0301";
 } ?>