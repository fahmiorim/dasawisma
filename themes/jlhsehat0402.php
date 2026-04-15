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
	  
		  
		$totrumah0402 =pg_query($koneksi, "select count(rumah) as totjlhrumah0402 from keluarga where kodekel='0402' and rumah='Sehat'");
		$jlhtotrumah0402=pg_fetch_array($totrumah0402); 
		$jumlahrumah0402=$jlhtotrumah0402[totjlhrumah0402];
		$totjumlahrumah0402=number_format($jumlahrumah0402,0,",",".");
		echo "$totjumlahrumah0402";
 } ?>