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
	  
		  
		$totrumah0101 =pg_query($koneksi, "select count(rumah) as totjlhrumah0101 from keluarga where kodekel='0101' and rumah='Sehat'");
		$jlhtotrumah0101=pg_fetch_array($totrumah0101); 
		$jumlahrumah0101=$jlhtotrumah0101[totjlhrumah0101];
		$totjumlahrumah0101=number_format($jumlahrumah0101,0,",",".");
		echo "$totjumlahrumah0101";
 } ?>