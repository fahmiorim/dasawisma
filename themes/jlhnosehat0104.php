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
	  
		  
$totnosehat0104 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0104 from keluarga where kodekel='0104' and rumah='Kurang Sehat'");
		$jlhtotnosehat0104=pg_fetch_array($totnosehat0104); 
		$jumlahnosehat0104=$jlhtotnosehat0104[totjlhnosehat0104];
		$totjumlahnosehat0104=number_format($jumlahnosehat0104,0,",",".");
		echo "$totjumlahnosehat0104";
 } ?>