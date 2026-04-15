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
	  
		  
		$totrumah0508 =pg_query($koneksi, "select count(rumah) as totjlhrumah0508 from keluarga where kodekel='0508' and rumah='Sehat'");
		$jlhtotrumah0508=pg_fetch_array($totrumah0508); 
		$jumlahrumah0508=$jlhtotrumah0508[totjlhrumah0508];
		$totjumlahrumah0508=number_format($jumlahrumah0508,0,",",".");
		echo "$totjumlahrumah0508";
 } ?>