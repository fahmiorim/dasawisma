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
	  
		  
$totnosehat0303 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0303 from keluarga where kodekel='0303' and rumah='Kurang Sehat'");
		$jlhtotnosehat0303=pg_fetch_array($totnosehat0303); 
		$jumlahnosehat0303=$jlhtotnosehat0303[totjlhnosehat0303];
		$totjumlahnosehat0303=number_format($jumlahnosehat0303,0,",",".");
		echo "$totjumlahnosehat0303";
 } ?>