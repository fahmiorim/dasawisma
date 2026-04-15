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
	  
		  
$totnosehat0405 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0405 from keluarga where kodekel='0405' and rumah='Kurang Sehat'");
		$jlhtotnosehat0405=pg_fetch_array($totnosehat0405); 
		$jumlahnosehat0405=$jlhtotnosehat0405[totjlhnosehat0405];
		$totjumlahnosehat0405=number_format($jumlahnosehat0405,0,",",".");
		echo "$totjumlahnosehat0405";
 } ?>