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
	  
		  
$totnosehat0508 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0508 from keluarga where kodekel='0508' and rumah='Kurang Sehat'");
		$jlhtotnosehat0508=pg_fetch_array($totnosehat0508); 
		$jumlahnosehat0508=$jlhtotnosehat0508[totjlhnosehat0508];
		$totjumlahnosehat0508=number_format($jumlahnosehat0508,0,",",".");
		echo "$totjumlahnosehat0508";
 } ?>