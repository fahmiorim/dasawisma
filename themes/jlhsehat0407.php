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
	  
		  
		$totrumah0407 =pg_query($koneksi, "select count(rumah) as totjlhrumah0407 from keluarga where kodekel='0407' and rumah='Sehat'");
		$jlhtotrumah0407=pg_fetch_array($totrumah0407); 
		$jumlahrumah0407=$jlhtotrumah0407[totjlhrumah0407];
		$totjumlahrumah0407=number_format($jumlahrumah0407,0,",",".");
		echo "$totjumlahrumah0407";
 } ?>