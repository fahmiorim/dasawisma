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
	  
		  
		$totrumah0105 =pg_query($koneksi, "select count(rumah) as totjlhrumah0105 from keluarga where kodekel='0105' and rumah='Sehat'");
		$jlhtotrumah0105=pg_fetch_array($totrumah0105); 
		$jumlahrumah0105=$jlhtotrumah0105[totjlhrumah0105];
		$totjumlahrumah0105=number_format($jumlahrumah0105,0,",",".");
		echo "$totjumlahrumah0105";
 } ?>