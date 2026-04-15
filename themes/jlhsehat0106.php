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
	  
		  
		$totrumah0106 =pg_query($koneksi, "select count(rumah) as totjlhrumah0106 from keluarga where kodekel='0106' and rumah='Sehat'");
		$jlhtotrumah0106=pg_fetch_array($totrumah0106); 
		$jumlahrumah0106=$jlhtotrumah0106[totjlhrumah0106];
		$totjumlahrumah0106=number_format($jumlahrumah0106,0,",",".");
		echo "$totjumlahrumah0106";
 } ?>