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
	  
		  
		$totrumah0303 =pg_query($koneksi, "select count(rumah) as totjlhrumah0303 from keluarga where kodekel='0303' and rumah='Sehat'");
		$jlhtotrumah0303=pg_fetch_array($totrumah0303); 
		$jumlahrumah0303=$jlhtotrumah0303[totjlhrumah0303];
		$totjumlahrumah0303=number_format($jumlahrumah0303,0,",",".");
		echo "$totjumlahrumah0303";
 } ?>