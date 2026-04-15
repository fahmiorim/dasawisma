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
	  
		  
$totnosehat0103 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0103 from keluarga where kodekel='0103' and rumah='Kurang Sehat'");
		$jlhtotnosehat0103=pg_fetch_array($totnosehat0103); 
		$jumlahnosehat0103=$jlhtotnosehat0103[totjlhnosehat0103];
		$totjumlahnosehat0103=number_format($jumlahnosehat0103,0,",",".");
		echo "$totjumlahnosehat0103";
 } ?>