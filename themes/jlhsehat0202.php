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
	  
		  
		$totrumah0202 =pg_query($koneksi, "select count(rumah) as totjlhrumah0202 from keluarga where kodekel='0202' and rumah='Sehat'");
		$jlhtotrumah0202=pg_fetch_array($totrumah0202); 
		$jumlahrumah0202=$jlhtotrumah0202[totjlhrumah0202];
		$totjumlahrumah0202=number_format($jumlahrumah0202,0,",",".");
		echo "$totjumlahrumah0202";
 } ?>