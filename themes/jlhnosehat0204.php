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
	  
		  
$totnosehat0204 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0204 from keluarga where kodekel='0204' and rumah='Kurang Sehat'");
		$jlhtotnosehat0204=pg_fetch_array($totnosehat0204); 
		$jumlahnosehat0204=$jlhtotnosehat0204[totjlhnosehat0204];
		$totjumlahnosehat0204=number_format($jumlahnosehat0204,0,",",".");
		echo "$totjumlahnosehat0204";
 } ?>