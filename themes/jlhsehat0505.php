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
	  
		  
		$totrumah0505 =pg_query($koneksi, "select count(rumah) as totjlhrumah0505 from keluarga where kodekel='0505' and rumah='Sehat'");
		$jlhtotrumah0505=pg_fetch_array($totrumah0505); 
		$jumlahrumah0505=$jlhtotrumah0505[totjlhrumah0505];
		$totjumlahrumah0505=number_format($jumlahrumah0505,0,",",".");
		echo "$totjumlahrumah0505";
 } ?>