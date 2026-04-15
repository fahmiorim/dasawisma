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
	  
		  
		$totrumah0507 =pg_query($koneksi, "select count(rumah) as totjlhrumah0507 from keluarga where kodekel='0507' and rumah='Sehat'");
		$jlhtotrumah0507=pg_fetch_array($totrumah0507); 
		$jumlahrumah0507=$jlhtotrumah0507[totjlhrumah0507];
		$totjumlahrumah0507=number_format($jumlahrumah0507,0,",",".");
		echo "$totjumlahrumah0507";
 } ?>