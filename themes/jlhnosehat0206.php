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
	  
		  
$totnosehat0206 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0206 from keluarga where kodekel='0206' and rumah='Kurang Sehat'");
		$jlhtotnosehat0206=pg_fetch_array($totnosehat0206); 
		$jumlahnosehat0206=$jlhtotnosehat0206[totjlhnosehat0206];
		$totjumlahnosehat0206=number_format($jumlahnosehat0206,0,",",".");
		echo "$totjumlahnosehat0206";
 } ?>