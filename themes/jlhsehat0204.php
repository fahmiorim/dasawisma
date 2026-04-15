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
	  
		  
		$totrumah0204 =pg_query($koneksi, "select count(rumah) as totjlhrumah0204 from keluarga where kodekel='0204' and rumah='Sehat'");
		$jlhtotrumah0204=pg_fetch_array($totrumah0204); 
		$jumlahrumah0204=$jlhtotrumah0204[totjlhrumah0204];
		$totjumlahrumah0204=number_format($jumlahrumah0204,0,",",".");
		echo "$totjumlahrumah0204";
 } ?>