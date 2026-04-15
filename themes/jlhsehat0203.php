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
	  
		  
		$totrumah0203 =pg_query($koneksi, "select count(rumah) as totjlhrumah0203 from keluarga where kodekel='0203' and rumah='Sehat'");
		$jlhtotrumah0203=pg_fetch_array($totrumah0203); 
		$jumlahrumah0203=$jlhtotrumah0203[totjlhrumah0203];
		$totjumlahrumah0203=number_format($jumlahrumah0203,0,",",".");
		echo "$totjumlahrumah0203";
 } ?>