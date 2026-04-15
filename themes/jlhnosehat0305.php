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
	  
		  
$totnosehat0305 =pg_query($koneksi, "select count(rumah) as totjlhnosehat0305 from keluarga where kodekel='0305' and rumah='Kurang Sehat'");
		$jlhtotnosehat0305=pg_fetch_array($totnosehat0305); 
		$jumlahnosehat0305=$jlhtotnosehat0305[totjlhnosehat0305];
		$totjumlahnosehat0305=number_format($jumlahnosehat0305,0,",",".");
		echo "$totjumlahnosehat0305";
 } ?>