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
	  
		  
$totnosehat0406 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0406 from keluarga where kodekel='0406' and rumah='Kurang Sehat'");
		$jlhtotnosehat0406=pg_fetch_array($totnosehat0406); 
		$jumlahnosehat0406=$jlhtotnosehat0406[totjlhnosehat0406];
		$totjumlahnosehat0406=number_format($jumlahnosehat0406,0,",",".");
		echo "$totjumlahnosehat0406";
 } ?>