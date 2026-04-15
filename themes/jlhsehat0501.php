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
	  
		  
		$totrumah0501 =pg_query($koneksi, "select count(rumah) as totjlhrumah0501 from keluarga where kodekel='0501' and rumah='Sehat'");
		$jlhtotrumah0501=pg_fetch_array($totrumah0501); 
		$jumlahrumah0501=$jlhtotrumah0501[totjlhrumah0501];
		$totjumlahrumah0501=number_format($jumlahrumah0501,0,",",".");
		echo "$totjumlahrumah0501";
 } ?>