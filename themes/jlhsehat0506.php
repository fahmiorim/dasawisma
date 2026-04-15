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
	  
		  
		$totrumah0506 =pg_query($koneksi, "select count(rumah) as totjlhrumah0506 from keluarga where kodekel='0506' and rumah='Sehat'");
		$jlhtotrumah0506=pg_fetch_array($totrumah0506); 
		$jumlahrumah0506=$jlhtotrumah0506[totjlhrumah0506];
		$totjumlahrumah0506=number_format($jumlahrumah0506,0,",",".");
		echo "$totjumlahrumah0506";
 } ?>