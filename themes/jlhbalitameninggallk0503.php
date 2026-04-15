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
	  
		  
$totbalital0503 =pg_query($koneksi, "select sum(balital) as totjlhbalital0503 from kehamilan where kodekel='0503'");
						$jlhtotbalital0503=pg_fetch_array($totbalital0503); 
						$jumlahbalital0503=$jlhtotbalital0503[totjlhbalital0503];
						$totjumlahbalital0503=number_format($jumlahbalital0503,0,",",".");
					echo "$totjumlahbalital0503";
 } ?>