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
	  
		  
$totnosehat0306 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0306 from keluarga where kodekel='0306' and rumah='Kurang Sehat'");
		$jlhtotnosehat0306=pg_fetch_array($totnosehat0306); 
		$jumlahnosehat0306=$jlhtotnosehat0306[totjlhnosehat0306];
		$totjumlahnosehat0306=number_format($jumlahnosehat0306,0,",",".");
		echo "$totjumlahnosehat0306";
 } ?>