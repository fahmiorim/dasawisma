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
	  
		  
$totnosehat0202 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0202 from keluarga where kodekel='0202' and rumah='Kurang Sehat'");
		$jlhtotnosehat0202=pg_fetch_array($totnosehat0202); 
		$jumlahnosehat0202=$jlhtotnosehat0202[totjlhnosehat0202];
		$totjumlahnosehat0202=number_format($jumlahnosehat0202,0,",",".");
		echo "$totjumlahnosehat0202";
 } ?>