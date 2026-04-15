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
	  
		  
$totnosehat0203 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0203 from keluarga where kodekel='0203' and rumah='Kurang Sehat'");
		$jlhtotnosehat0203=pg_fetch_array($totnosehat0203); 
		$jumlahnosehat0203=$jlhtotnosehat0203[totjlhnosehat0203];
		$totjumlahnosehat0203=number_format($jumlahnosehat0203,0,",",".");
		echo "$totjumlahnosehat0203";
 } ?>