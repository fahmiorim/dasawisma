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
	  
		  
		$totrumah0301 =pg_query($koneksi, "select count(rumah) as totjlhrumah0301 from keluarga where kodekel='0301' and rumah='Sehat'");
		$jlhtotrumah0301=pg_fetch_array($totrumah0301); 
		$jumlahrumah0301=$jlhtotrumah0301[totjlhrumah0301];
		$totjumlahrumah0301=number_format($jumlahrumah0301,0,",",".");
		echo "$totjumlahrumah0301";
 } ?>