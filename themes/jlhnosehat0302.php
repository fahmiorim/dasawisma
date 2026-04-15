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
	  
		  
$totnosehat0302 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0302 from keluarga where kodekel='0302' and rumah='Kurang Sehat'");
		$jlhtotnosehat0302=pg_fetch_array($totnosehat0302); 
		$jumlahnosehat0302=$jlhtotnosehat0302[totjlhnosehat0302];
		$totjumlahnosehat0302=number_format($jumlahnosehat0302,0,",",".");
		echo "$totjumlahnosehat0302";
 } ?>