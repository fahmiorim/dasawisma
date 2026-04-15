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
	  
		  
		$totrumah0302 =pg_query($koneksi, "select count(rumah) as totjlhrumah0302 from keluarga where kodekel='0302' and rumah='Sehat'");
		$jlhtotrumah0302=pg_fetch_array($totrumah0302); 
		$jumlahrumah0302=$jlhtotrumah0302[totjlhrumah0302];
		$totjumlahrumah0302=number_format($jumlahrumah0302,0,",",".");
		echo "$totjumlahrumah0302";
 } ?>