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
	  
		  
		$totrumah0304 =pg_query($koneksi, "select count(rumah) as totjlhrumah0304 from keluarga where kodekel='0304' and rumah='Sehat'");
		$jlhtotrumah0304=pg_fetch_array($totrumah0304); 
		$jumlahrumah0304=$jlhtotrumah0304[totjlhrumah0304];
		$totjumlahrumah0304=number_format($jumlahrumah0304,0,",",".");
		echo "$totjumlahrumah0304";
 } ?>