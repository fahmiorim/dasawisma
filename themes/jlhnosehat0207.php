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
	  
		  
$totnosehat0207 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0207 from keluarga where kodekel='0207' and rumah='Kurang Sehat'");
		$jlhtotnosehat0207=pg_fetch_array($totnosehat0207); 
		$jumlahnosehat0207=$jlhtotnosehat0207[totjlhnosehat0207];
		$totjumlahnosehat0207=number_format($jumlahnosehat0207,0,",",".");
		echo "$totjumlahnosehat0207";
 } ?>