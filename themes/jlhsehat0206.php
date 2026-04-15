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
	  
		  
		$totrumah0206 =pg_query($koneksi, "select count(rumah) as totjlhrumah0206 from keluarga where kodekel='0206' and rumah='Sehat'");
		$jlhtotrumah0206=pg_fetch_array($totrumah0206); 
		$jumlahrumah0206=$jlhtotrumah0206[totjlhrumah0206];
		$totjumlahrumah0206=number_format($jumlahrumah0206,0,",",".");
		echo "$totjumlahrumah0206";
 } ?>