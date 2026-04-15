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
	  
		  
$totbalital0302 =pg_query($koneksi, "select sum(balital) as totjlhbalital0302 from kehamilan where kodekel='0302'");
						$jlhtotbalital0302=pg_fetch_array($totbalital0302); 
						$jumlahbalital0302=$jlhtotbalital0302[totjlhbalital0302];
						$totjumlahbalital0302=number_format($jumlahbalital0302,0,",",".");
					echo "$totjumlahbalital0302";
 } ?>