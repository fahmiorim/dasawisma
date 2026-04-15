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
	  
		  
$totnosehat0304 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0304 from keluarga where kodekel='0304' and rumah='Kurang Sehat'");
		$jlhtotnosehat0304=pg_fetch_array($totnosehat0304); 
		$jumlahnosehat0304=$jlhtotnosehat0304[totjlhnosehat0304];
		$totjumlahnosehat0304=number_format($jumlahnosehat0304,0,",",".");
		echo "$totjumlahnosehat0304";
 } ?>