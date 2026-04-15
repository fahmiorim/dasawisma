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
	  
		  
$totnosehat0505 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0505 from keluarga where kodekel='0505' and rumah='Kurang Sehat'");
		$jlhtotnosehat0505=pg_fetch_array($totnosehat0505); 
		$jumlahnosehat0505=$jlhtotnosehat0505[totjlhnosehat0505];
		$totjumlahnosehat0505=number_format($jumlahnosehat0505,0,",",".");
		echo "$totjumlahnosehat0505";
 } ?>