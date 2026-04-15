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
	  
		  
		$totrumah0104 =pg_query($koneksi, "select count(rumah) as totjlhrumah0104 from keluarga where kodekel='0104' and rumah='Sehat'");
		$jlhtotrumah0104=pg_fetch_array($totrumah0104); 
		$jumlahrumah0104=$jlhtotrumah0104[totjlhrumah0104];
		$totjumlahrumah0104=number_format($jumlahrumah0104,0,",",".");
		echo "$totjumlahrumah0104";
 } ?>