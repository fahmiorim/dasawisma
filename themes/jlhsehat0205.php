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
	  
		  
		$totrumah0205 =pg_query($koneksi, "select count(rumah) as totjlhrumah0205 from keluarga where kodekel='0205' and rumah='Sehat'");
		$jlhtotrumah0205=pg_fetch_array($totrumah0205); 
		$jumlahrumah0205=$jlhtotrumah0205[totjlhrumah0205];
		$totjumlahrumah0205=number_format($jumlahrumah0205,0,",",".");
		echo "$totjumlahrumah0205";
 } ?>