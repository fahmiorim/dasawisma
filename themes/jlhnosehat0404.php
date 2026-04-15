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
	  
		  
$totnosehat0404 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0404 from keluarga where kodekel='0404' and rumah='Kurang Sehat'");
		$jlhtotnosehat0404=pg_fetch_array($totnosehat0404); 
		$jumlahnosehat0404=$jlhtotnosehat0404[totjlhnosehat0404];
		$totjumlahnosehat0404=number_format($jumlahnosehat0404,0,",",".");
		echo "$totjumlahnosehat0404";
 } ?>