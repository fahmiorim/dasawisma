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
	  
		  
$totnosehat0507 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0507 from keluarga where kodekel='0507' and rumah='Kurang Sehat'");
		$jlhtotnosehat0507=pg_fetch_array($totnosehat0507); 
		$jumlahnosehat0507=$jlhtotnosehat0507[totjlhnosehat0507];
		$totjumlahnosehat0507=number_format($jumlahnosehat0507,0,",",".");
		echo "$totjumlahnosehat0507";
 } ?>