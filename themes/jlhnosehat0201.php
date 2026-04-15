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
	  
		  
$totnosehat0201 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0201 from keluarga where kodekel='0201' and rumah='Kurang Sehat'");
		$jlhtotnosehat0201=pg_fetch_array($totnosehat0201); 
		$jumlahnosehat0201=$jlhtotnosehat0201[totjlhnosehat0201];
		$totjumlahnosehat0201=number_format($jumlahnosehat0201,0,",",".");
		echo "$totjumlahnosehat0201";
 } ?>