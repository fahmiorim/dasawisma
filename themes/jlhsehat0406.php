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
	  
		  
		$totrumah0406 =pg_query($koneksi, "select count(rumah) as totjlhrumah0406 from keluarga where kodekel='0406' and rumah='Sehat'");
		$jlhtotrumah0406=pg_fetch_array($totrumah0406); 
		$jumlahrumah0406=$jlhtotrumah0406[totjlhrumah0406];
		$totjumlahrumah0406=number_format($jumlahrumah0406,0,",",".");
		echo "$totjumlahrumah0406";
 } ?>