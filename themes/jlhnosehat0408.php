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
	  
		  
$totnosehat0408 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0408 from keluarga where kodekel='0408' and rumah='Kurang Sehat'");
		$jlhtotnosehat0408=pg_fetch_array($totnosehat0408); 
		$jumlahnosehat0408=$jlhtotnosehat0408[totjlhnosehat0408];
		$totjumlahnosehat0408=number_format($jumlahnosehat0408,0,",",".");
		echo "$totjumlahnosehat0408";
 } ?>