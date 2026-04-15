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
	  
		  
$totnosehat0506 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0506 from keluarga where kodekel='0506' and rumah='Kurang Sehat'");
		$jlhtotnosehat0506=pg_fetch_array($totnosehat0506); 
		$jumlahnosehat0506=$jlhtotnosehat0506[totjlhnosehat0506];
		$totjumlahnosehat0506=number_format($jumlahnosehat0506,0,",",".");
		echo "$totjumlahnosehat0506";
 } ?>