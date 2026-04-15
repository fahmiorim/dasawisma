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
	  
		  
		$totrumah0103 =pg_query($koneksi, "select count(rumah) as totjlhrumah0103 from keluarga where kodekel='0103' and rumah='Sehat'");
		$jlhtotrumah0103=pg_fetch_array($totrumah0103); 
		$jumlahrumah0103=$jlhtotrumah0103[totjlhrumah0103];
		$totjumlahrumah0103=number_format($jumlahrumah0103,0,",",".");
		echo "$totjumlahrumah0103";
 } ?>