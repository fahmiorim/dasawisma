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
	  
		  
		$totrumah0404 =pg_query($koneksi, "select count(rumah) as totjlhrumah0404 from keluarga where kodekel='0404' and rumah='Sehat'");
		$jlhtotrumah0404=pg_fetch_array($totrumah0404); 
		$jumlahrumah0404=$jlhtotrumah0404[totjlhrumah0404];
		$totjumlahrumah0404=number_format($jumlahrumah0404,0,",",".");
		echo "$totjumlahrumah0404";
 } ?>