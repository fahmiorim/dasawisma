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
	  
		  
		$totrumah0403 =pg_query($koneksi, "select count(rumah) as totjlhrumah0403 from keluarga where kodekel='0403' and rumah='Sehat'");
		$jlhtotrumah0403=pg_fetch_array($totrumah0403); 
		$jumlahrumah0403=$jlhtotrumah0403[totjlhrumah0403];
		$totjumlahrumah0403=number_format($jumlahrumah0403,0,",",".");
		echo "$totjumlahrumah0403";
 } ?>