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
	  
		  
		$totrumah0207 =pg_query($koneksi, "select count(rumah) as totjlhrumah0207 from keluarga where kodekel='0207' and rumah='Sehat'");
		$jlhtotrumah0207=pg_fetch_array($totrumah0207); 
		$jumlahrumah0207=$jlhtotrumah0207[totjlhrumah0207];
		$totjumlahrumah0207=number_format($jumlahrumah0207,0,",",".");
		echo "$totjumlahrumah0207";
 } ?>