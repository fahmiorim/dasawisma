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
	  
		  
$totnosehat0102 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0102 from keluarga where kodekel='0102' and rumah='Kurang Sehat'");
		$jlhtotnosehat0102=pg_fetch_array($totnosehat0102); 
		$jumlahnosehat0102=$jlhtotnosehat0102[totjlhnosehat0102];
		$totjumlahnosehat0102=number_format($jumlahnosehat0102,0,",",".");
		echo "$totjumlahnosehat0102";
 } ?>