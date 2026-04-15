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
	  
		  
$totbalital0401 =pg_query($koneksi, "select sum(balital) as totjlhbalital0401 from kehamilan where kodekel='0401'");
						$jlhtotbalital0401=pg_fetch_array($totbalital0401); 
						$jumlahbalital0401=$jlhtotbalital0401[totjlhbalital0401];
						$totjumlahbalital0401=number_format($jumlahbalital0401,0,",",".");
					echo "$totjumlahbalital0401";
 } ?>