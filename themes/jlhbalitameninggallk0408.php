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
	  
		  
$totbalital0408 =pg_query($koneksi, "select sum(balital) as totjlhbalital0408 from kehamilan where kodekel='0408'");
						$jlhtotbalital0408=pg_fetch_array($totbalital0408); 
						$jumlahbalital0408=$jlhtotbalital0408[totjlhbalital0408];
						$totjumlahbalital0408=number_format($jumlahbalital0408,0,",",".");
					echo "$totjumlahbalital0408";
 } ?>