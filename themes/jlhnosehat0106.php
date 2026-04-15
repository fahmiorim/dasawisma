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
	  
		  
$totnosehat0106 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0106 from keluarga where kodekel='0106' and rumah='Kurang Sehat'");
		$jlhtotnosehat0106=pg_fetch_array($totnosehat0106); 
		$jumlahnosehat0106=$jlhtotnosehat0106[totjlhnosehat0106];
		$totjumlahnosehat0106=number_format($jumlahnosehat0106,0,",",".");
		echo "$totjumlahnosehat0106";
 } ?>