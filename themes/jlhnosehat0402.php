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
	  
		  
$totnosehat0402 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0402 from keluarga where kodekel='0402' and rumah='Kurang Sehat'");
		$jlhtotnosehat0402=pg_fetch_array($totnosehat0402); 
		$jumlahnosehat0402=$jlhtotnosehat0402[totjlhnosehat0402];
		$totjumlahnosehat0402=number_format($jumlahnosehat0402,0,",",".");
		echo "$totjumlahnosehat0402";
 } ?>