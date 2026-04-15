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
	  
		  
		$totrumah0504 =pg_query($koneksi, "select count(rumah) as totjlhrumah0504 from keluarga where kodekel='0504' and rumah='Sehat'");
		$jlhtotrumah0504=pg_fetch_array($totrumah0504); 
		$jumlahrumah0504=$jlhtotrumah0504[totjlhrumah0504];
		$totjumlahrumah0504=number_format($jumlahrumah0504,0,",",".");
		echo "$totjumlahrumah0504";
 } ?>