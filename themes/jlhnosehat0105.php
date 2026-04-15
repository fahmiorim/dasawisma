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
	  
		  
$totnosehat0105 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0105 from keluarga where kodekel='0105' and rumah='Kurang Sehat'");
		$jlhtotnosehat0105=pg_fetch_array($totnosehat0105); 
		$jumlahnosehat0105=$jlhtotnosehat0105[totjlhnosehat0105];
		$totjumlahnosehat0105=number_format($jumlahnosehat0105,0,",",".");
		echo "$totjumlahnosehat0105";
 } ?>