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
	  
		  
$totnosehat0205 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0205 from keluarga where kodekel='0205' and rumah='Kurang Sehat'");
		$jlhtotnosehat0205=pg_fetch_array($totnosehat0205); 
		$jumlahnosehat0205=$jlhtotnosehat0205[totjlhnosehat0205];
		$totjumlahnosehat0205=number_format($jumlahnosehat0205,0,",",".");
		echo "$totjumlahnosehat0205";
 } ?>