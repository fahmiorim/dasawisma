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
	  
		  
$totnosehat0502 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0502 from keluarga where kodekel='0502' and rumah='Kurang Sehat'");
		$jlhtotnosehat0502=pg_fetch_array($totnosehat0502); 
		$jumlahnosehat0502=$jlhtotnosehat0502[totjlhnosehat0502];
		$totjumlahnosehat0502=number_format($jumlahnosehat0502,0,",",".");
		echo "$totjumlahnosehat0502";
 } ?>