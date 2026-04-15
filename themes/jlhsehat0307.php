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
	  
		  
		$totrumah0307 =pg_query($koneksi, "select count(rumah) as totjlhrumah0307 from keluarga where kodekel='0307' and rumah='Sehat'");
		$jlhtotrumah0307=pg_fetch_array($totrumah0307); 
		$jumlahrumah0307=$jlhtotrumah0307[totjlhrumah0307];
		$totjumlahrumah0307=number_format($jumlahrumah0307,0,",",".");
		echo "$totjumlahrumah0307";
 } ?>