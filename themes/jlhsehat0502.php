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
	  
		  
		$totrumah0502 =pg_query($koneksi, "select count(rumah) as totjlhrumah0502 from keluarga where kodekel='0502' and rumah='Sehat'");
		$jlhtotrumah0502=pg_fetch_array($totrumah0502); 
		$jumlahrumah0502=$jlhtotrumah0502[totjlhrumah0502];
		$totjumlahrumah0502=number_format($jumlahrumah0502,0,",",".");
		echo "$totjumlahrumah0502";
 } ?>