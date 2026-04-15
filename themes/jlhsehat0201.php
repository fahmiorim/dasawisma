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
	  
		  
		$totrumah0201 =pg_query($koneksi, "select count(rumah) as totjlhrumah0201 from keluarga where kodekel='0201' and rumah='Sehat'");
		$jlhtotrumah0201=pg_fetch_array($totrumah0201); 
		$jumlahrumah0201=$jlhtotrumah0201[totjlhrumah0201];
		$totjumlahrumah0201=number_format($jumlahrumah0201,0,",",".");
		echo "$totjumlahrumah0201";
 } ?>