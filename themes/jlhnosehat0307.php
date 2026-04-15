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
	  
		  
$totnosehat0307 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0307 from keluarga where kodekel='0307' and rumah='Kurang Sehat'");
		$jlhtotnosehat0307=pg_fetch_array($totnosehat0307); 
		$jumlahnosehat0307=$jlhtotnosehat0307[totjlhnosehat0307];
		$totjumlahnosehat0307=number_format($jumlahnosehat0307,0,",",".");
		echo "$totjumlahnosehat0307";
 } ?>