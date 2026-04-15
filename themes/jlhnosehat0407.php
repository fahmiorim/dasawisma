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
	  
		  
$totnosehat0407 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0407 from keluarga where kodekel='0407' and rumah='Kurang Sehat'");
		$jlhtotnosehat0407=pg_fetch_array($totnosehat0407); 
		$jumlahnosehat0407=$jlhtotnosehat0407[totjlhnosehat0407];
		$totjumlahnosehat0407=number_format($jumlahnosehat0407,0,",",".");
		echo "$totjumlahnosehat0407";
 } ?>