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
	  
		  
		$totrumah0102 =pg_query($koneksi, "select count(rumah) as totjlhrumah0102 from keluarga where kodekel='0102' and rumah='Sehat'");
		$jlhtotrumah0102=pg_fetch_array($totrumah0102); 
		$jumlahrumah0102=$jlhtotrumah0102[totjlhrumah0102];
		$totjumlahrumah0102=number_format($jumlahrumah0102,0,",",".");
		echo "$totjumlahrumah0102";
 } ?>