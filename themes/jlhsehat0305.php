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
	  
		  
		$totrumah0305 =pg_query($koneksi, "select count(rumah) as totjlhrumah0305 from keluarga where kodekel='0305' and rumah='Sehat'");
		$jlhtotrumah0305=pg_fetch_array($totrumah0305); 
		$jumlahrumah0305=$jlhtotrumah0305[totjlhrumah0305];
		$totjumlahrumah0305=number_format($jumlahrumah0305,0,",",".");
		echo "$totjumlahrumah0305";
 } ?>