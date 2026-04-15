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
	  
		  
$totnosehat0101 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0101 from keluarga where kodekel='0101' and rumah='Kurang Sehat'");
		$jlhtotnosehat0101=pg_fetch_array($totnosehat0101); 
		$jumlahnosehat0101=$jlhtotnosehat0101[totjlhnosehat0101];
		$totjumlahnosehat0101=number_format($jumlahnosehat0101,0,",",".");
		echo "$totjumlahnosehat0101";
 } ?>